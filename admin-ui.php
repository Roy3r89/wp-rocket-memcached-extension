<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'admin_menu', function() {
    add_menu_page(
        __( 'WP Rocket Memcached', 'wp-rocket-memcached' ),
        __( 'WP Rocket Memcached', 'wp-rocket-memcached' ),
        'manage_options',
        'wp-rocket-memcached',
        'wp_rocket_memcached_admin_page',
        'dashicons-admin-generic'
    );
} );

function wp_rocket_memcached_admin_page() {
    $cache = $GLOBALS['wp_rocket_memcached_cache'] ?? null;
    if ( ! $cache ) {
        echo '<div class="notice notice-error"><p>' . esc_html__( 'El sistema de Memcached no está disponible.', 'wp-rocket-memcached' ) . '</p></div>';
        return;
    }

    $settings = get_option( 'wp_rocket_memcached_settings', [
        'ttl' => 3600,
        'prefix' => 'wp_rocket_cache_',
        'servers' => [ ['127.0.0.1', 11211] ]
    ] );

    $stats = $cache->get_stats();

    global $wpdb;
    $index_table = $wpdb->prefix . 'wp_rocket_memcached_cache_index';
    $total_keys = $wpdb->get_var( "SELECT COUNT(*) FROM {$index_table}" );

    $purge_queue = get_option( 'wp_rocket_memcached_purge_queue', [] );

    $upload_dir = wp_upload_dir();
    $log_file = trailingslashit( $upload_dir['basedir'] ) . 'memcached.log';
    $log_lines = file_exists($log_file) ? array_slice( file( $log_file ), -50 ) : [];

    ?>
    <div class="wrap">
        <h1><?php esc_html_e( 'WP Rocket Memcached - Panel de Administración', 'wp-rocket-memcached' ); ?></h1>

        <table class="widefat striped">
            <tr><th><?php esc_html_e( 'Total de claves cacheadas:', 'wp-rocket-memcached' ); ?></th><td><?php echo intval($total_keys); ?></td></tr>
            <tr><th><?php esc_html_e( 'Claves en cola para purgar:', 'wp-rocket-memcached' ); ?></th><td><?php echo count($purge_queue); ?></td></tr>
        </table>

        <h2><?php esc_html_e( 'Estadísticas de Caché', 'wp-rocket-memcached' ); ?></h2>
        <table class="widefat striped">
            <tr><th><?php esc_html_e( 'Total Lecturas', 'wp-rocket-memcached' ); ?></th><td><?php echo intval($stats['reads']); ?></td></tr>
            <tr><th><?php esc_html_e( 'Hits (aciertos)', 'wp-rocket-memcached' ); ?></th><td><?php echo intval($stats['hits']); ?></td></tr>
            <tr><th><?php esc_html_e( 'Misses (fallos)', 'wp-rocket-memcached' ); ?></th><td><?php echo intval($stats['misses']); ?></td></tr>
            <tr><th><?php esc_html_e( 'Ratio Hit (%)', 'wp-rocket-memcached' ); ?></th>
                <td><?php
                    $ratio = $stats['reads'] > 0 ? round( ( $stats['hits'] / $stats['reads'] ) * 100, 2 ) : 0;
                    echo $ratio . '%';
                ?></td>
            </tr>
        </table>

        <h2><?php esc_html_e( 'Últimas líneas del log', 'wp-rocket-memcached' ); ?></h2>
        <pre style="background:#f1f1f1; padding:10px; border:1px solid #ccc; max-height:300px; overflow:auto;"><?php
            echo empty($log_lines) ? esc_html__( 'No hay registros aún.', 'wp-rocket-memcached' ) : esc_html( implode( '', $log_lines ) );
        ?></pre>
    </div>
    <?php
}
