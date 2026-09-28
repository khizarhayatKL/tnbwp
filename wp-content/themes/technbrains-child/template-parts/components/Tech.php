<?php defined('ABSPATH')||exit;
$data=get_query_var('component_data');
$row1=$data['tech_row_1']??[];
$row2=$data['tech_row_2']??[];

$tech_data = [
    'React'      => ['logo' => '/wp-content/uploads/2026/06/react.png',      'link' => '/technologies/react-native/'],
    'Angular'    => ['logo' => '/wp-content/uploads/2026/06/angular.png',    'link' => '/technologies/angular/'],
    'Flutter'    => ['logo' => '/wp-content/uploads/2026/06/tech-1.png',     'link' => '/technologies/flutter/'],
    'Node.js'    => ['logo' => '/wp-content/uploads/2026/06/node-js.png',    'link' => '/technologies/nodejs/'],
    'Python'     => ['logo' => '/wp-content/uploads/2026/06/python.png',     'link' => '/technologies/python/'],
    'Android'    => ['logo' => '/wp-content/uploads/2026/06/android.png',    'link' => '#'],
    'Azure'      => ['logo' => '/wp-content/uploads/2026/06/azure.png',      'link' => '#'],
    'AWS'        => ['logo' => '/wp-content/uploads/2026/06/aws.png',        'link' => '#'],
    'Dart'       => ['logo' => '/wp-content/uploads/2026/06/dart.png',       'link' => '#'],
    'Drupal'     => ['logo' => '/wp-content/uploads/2026/06/drupal.png',     'link' => '#'],
    'Express JS' => ['logo' => '/wp-content/uploads/2026/06/express.png',    'link' => '#'],
    'Kafka'      => ['logo' => '/wp-content/uploads/2026/06/kafka.png',      'link' => '#'],
    'React JS'      => ['logo' => '/wp-content/uploads/2026/06/react.png',      'link' => '/technologies/reactjs/'],
    'Firebase'   => ['logo' => '/wp-content/uploads/2026/06/firebase.png',   'link' => '#'],
    'HubSpot'    => ['logo' => '/wp-content/uploads/2026/06/hubspot.png',    'link' => '#'],
    'Docker'     => ['logo' => '/wp-content/uploads/2026/06/docker.png',     'link' => '#'],
    'Kotlin'     => ['logo' => '/wp-content/uploads/2026/06/kotlin.png',     'link' => '#'],
    'MySQL'      => ['logo' => '/wp-content/uploads/2026/06/mysql.png',      'link' => '#'],
    'MongoDB'    => ['logo' => '/wp-content/uploads/2026/06/mongo-db.png',   'link' => '#'],
    'PHP'        => ['logo' => '/wp-content/uploads/2026/06/php.png',        'link' => '/technologies/php/'],
    'TypeScript'      => ['logo' => '/wp-content/uploads/2026/06/typescript.png',      'link' => '#'],
    'Swift'      => ['logo' => '/wp-content/uploads/2026/06/swift.png',      'link' => '#'],
    'Rails'      => ['logo' => '/wp-content/uploads/2026/06/ruby-rails.png', 'link' => '#'],
    'Oracle'      => ['logo' => '/wp-content/uploads/2026/06/oracle.png', 'link' => '#'],
    'Django'      => ['logo' => '/wp-content/uploads/2026/06/django.png', 'link' => '#'],
];

function render_tech_row(array $items, array $tech_data, bool $reverse = false): void {
    $doubled = array_merge($items, $items);
    $cls = 'tech-track' . ($reverse ? ' reverse' : '');

    echo '<div class="tech-row"><div class="' . esc_attr($cls) . '">';

    foreach ($doubled as $t) {
        $logo_url = $tech_data[$t['name']]['logo'] ?? '';
        $link     = $tech_data[$t['name']]['link'] ?? '#';

        if (!empty($link) && $link !== '#') {
            echo '<a class="tech-chip" href="' . esc_url($link) . '" target="_blank" rel="noopener">
                    <img src="' . esc_url($logo_url) . '" alt="' . esc_attr($t['name']) . '" width="96" height="27" loading="lazy">
                  </a>';
        } else {
            echo '<span class="tech-chip">
                    <img src="' . esc_url($logo_url) . '" alt="' . esc_attr($t['name']) . '" width="96" height="27" loading="lazy">
                  </span>';
        }
    }

    echo '</div></div>';
}
?>
<section class="tech" data-screen-label="08 Tech">
  <div class="tech-header"><h2>The tech stack we use to test, ship, and scale</h2></div>
  <?php render_tech_row($row1, $tech_data); ?>
  <?php render_tech_row($row2, $tech_data, true); ?>
</section>