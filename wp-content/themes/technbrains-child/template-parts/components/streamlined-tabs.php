<?php
defined( 'ABSPATH' ) || exit;

$data    = get_query_var( 'component_data' );
$d       = $data['streamlined_tabs'] ?? array();
$listing = $d['listing'] ?? array();
$mod     = get_query_var( 'component_modifier_classes', '' );
$kses_h  = array( 'span' => array() );

static $stt_instance = 0;
$stt_instance++;
$acc_id = 'sttAcc-' . $stt_instance;
?>
<section class="StreamlinedTabsSec<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="stt-content">
			<div class="streamlinedAccordianContent">
				<div class="accordion accordion-flush streamlinedAccordian" id="<?php echo esc_attr( $acc_id ); ?>">
					<?php foreach ( $listing as $i => $item ) : ?>
					<div class="accordion-item listItem">
						<h2 class="accordion-header listHead" id="<?php echo esc_attr( $acc_id . '-h-' . $i ); ?>">
							<button
								class="accordion-button<?php echo 0 === $i ? '' : ' collapsed'; ?>"
								type="button"
								data-bs-toggle="collapse"
								data-bs-target="#<?php echo esc_attr( $acc_id . '-b-' . $i ); ?>"
								aria-expanded="<?php echo 0 === $i ? 'true' : 'false'; ?>"
								aria-controls="<?php echo esc_attr( $acc_id . '-b-' . $i ); ?>"
							>
								<span><?php echo esc_html( str_pad( (string) ( $i + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
								<?php echo esc_html( $item['question'] ?? '' ); ?>
							</button>
						</h2>
						<div
							id="<?php echo esc_attr( $acc_id . '-b-' . $i ); ?>"
							class="accordion-collapse collapse<?php echo 0 === $i ? ' show' : ''; ?>"
							aria-labelledby="<?php echo esc_attr( $acc_id . '-h-' . $i ); ?>"
							data-bs-parent="#<?php echo esc_attr( $acc_id ); ?>"
						>
							<div class="accordion-body listBody">
								<?php echo wp_kses( $item['answer'] ?? '', array( 
    'a' => array( 
        'href'   => array(), 
        'title'  => array(), 
        'target' => array(), 
        'rel'    => array() 
    ) 
) ); ?>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="heading">
				<?php if ( ! empty( $d['heading'] ) ) : ?>
				<h2><?php echo wp_kses( $d['heading'], $kses_h ); ?></h2>
				<?php endif; ?>
				<?php if ( ! empty( $d['para'] ) ) : ?>
				<p><?php echo esc_html( $d['para'] ); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
