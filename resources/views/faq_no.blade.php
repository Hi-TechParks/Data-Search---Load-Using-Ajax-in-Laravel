<?php

		foreach ($pro_faqs_no as $pro_faq_no) {
            $output = $pro_faq_no->Q_NO + 1;
        }

        if (!empty($output)) {
            echo '<input type="text" id="faq_no" placeholder="FAQ Number" name="number" value="'.$output.'" required="" class="form-control">';
        }
        else {
            echo '<input type="text" id="faq_no" placeholder="FAQ Number" name="number" value="1" required="" class="form-control">';
        }

?>


