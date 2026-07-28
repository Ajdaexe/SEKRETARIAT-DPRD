<?php
defined( 'ABSPATH' ) || die();
require_once ABSPATH . WPINC . '/class-wpdb.php';

class wpdb_aiven extends wpdb {
    public function db_connect( $allow_bail = true ) {
        $this->is_mysql = true;
        $client_flags = defined( 'MYSQL_CLIENT_FLAGS' ) ? MYSQL_CLIENT_FLAGS : 0;
        mysqli_report( MYSQLI_REPORT_OFF );
        
        $this->dbh = mysqli_init();

        // INJECT CA CERT FOR AIVEN
        if ( defined( 'MYSQL_SSL_CA' ) ) {
            mysqli_ssl_set( $this->dbh, null, null, MYSQL_SSL_CA, null, null );
        }

        $host = $this->dbhost;
        $port = null;
        $socket = null;
        $is_ipv6 = false;

        $host_data = $this->parse_db_host( $this->dbhost );
        if ( $host_data ) {
            list( $host, $port, $socket, $is_ipv6 ) = $host_data;
        }

        if ( $is_ipv6 && extension_loaded( 'mysqlnd' ) ) {
            $host = "[$host]";
        }

        if ( WP_DEBUG ) {
            mysqli_real_connect( $this->dbh, $host, $this->dbuser, $this->dbpassword, null, $port, $socket, $client_flags );
        } else {
            @mysqli_real_connect( $this->dbh, $host, $this->dbuser, $this->dbpassword, null, $port, $socket, $client_flags );
        }

        if ( $this->dbh->connect_errno ) {
            $this->dbh = null;
        }

        if ( ! $this->dbh && $allow_bail ) {
            // Let the parent class handle the error UI
            return parent::db_connect( $allow_bail ); 
        } elseif ( $this->dbh ) {
            if ( ! $this->has_connected ) {
                $this->init_charset();
            }
            $this->has_connected = true;
            $this->set_charset( $this->dbh );
            $this->ready = true;
            $this->set_sql_mode();
            $this->select( $this->dbname, $this->dbh );
            return true;
        }
        return false;
    }
}

$wpdb = new wpdb_aiven( DB_USER, DB_PASSWORD, DB_NAME, DB_HOST );
