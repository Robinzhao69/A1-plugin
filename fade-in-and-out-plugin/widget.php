<?php

class elementor_fade_in_sentences_widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'fade-in-sentences-widget';
    }

    public function get_title() {
        return __('Fade-In Sentences', 'elementor-fade-in-sentences-widget');
    }

    public function get_icon() {
        return 'eicon-editor-code';
    }

    public function get_categories() {
        return ['basic'];
    }

    protected function _register_controls() {
        // No controls needed for this widget
    }
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="custom-widget">
        	<div class="sentence">Onze zoon raakt sinds twee maanden erg van slag bij het woord school.</div>
        	<div class="sentence">Ons dochtertje eet ineens nauwelijks meer.</div>
        	<div class="sentence">We krijgen zo weinig contact met onze zoon van 15 jaar.</div>
        	<div class="sentence">Mijn zoon is ’s nachts zo bang.</div>
        	<div class="sentence">Wij weten niet welke school het meest geschikt is voor ons zoontje.</div>
        	<div class="sentence">Onze dochter van 12 verdraait ineens heel vaak de waarheid.</div>
        	<div class="sentence">Hoe kan ik het beste de nachtvoeding van onze baby afbouwen?</div>
			<div class="sentence">Onze dochter van 4 jaar slaapwandelt heel veel.</div>
			<div class="sentence">Sinds onze scheiding herken ik ons dochtertje niet meer terug.</div>
			<div class="sentence">Onze zoon wil iedere twee maanden van sport wisselen.</div>
			<div class="sentence">Mijn zoon van 11 jaar is intens verdrietig</div>
			<div class="sentence">Zodra we bezoek krijgen, raakt mijn dochter helemaal van slag.</div>
			<div class="sentence">Mijn gehandicapte dochter (27 jaar) heeft het niet meer naar haar zin in haar
				verzorgingsinstelling.</div>
		</div>
		<style>
        .custom-widget {
            position: relative;
			width: 100%; /* Use full width of the container */
			height: 200px; /* Automatically adjust height based on content */
			display: flex;
			justify-content: center;
			align-items: center;
			padding: 20px; /* Add some padding for spacing */
			background-color: #B4AC89;
			border-radius: 50%;
			color: white;
			text-align: center;
        }

        .custom-widget .sentence {
                display: flex;
				justify-content: center;
				align-items: center;
				width: 100%;
				height: 200px; /* Automatically adjust height based on content */
				
				opacity: 0;
				transition: opacity 0.5s ease;
				
            /* Prevent line breaks */
        }
			
			.sentence{
				position: absolute;
				top: 0;
				left: 0;
			}

        .custom-widget .sentence.active {
            opacity: 1;
        }

		</style>
		<script>
				document.addEventListener('DOMContentLoaded', function () {
					var sentences = document.querySelectorAll('.custom-widget .sentence');
					var index = 0;

					function fadeInNext() {
						sentences[index].classList.add('active');
						setTimeout(fadeOutNext, 5000); // Adjust timing as needed
					}

					function fadeOutNext() {
						sentences[index].classList.remove('active');
						index++;
						if (index >= sentences.length) {
							index = 0; // Go back to the first sentence
						}
						setTimeout(fadeInNext, 1000); // Adjust timing as needed
					}

					fadeInNext();
				});
			</script>
		<?php
	}
}

?>