﻿(
    function ($) {
        $.timepicker.regional['hu'] = {
            timeOnlyTitle: 'Válasszon időpontot',
            timeText: 'Idő',
            hourText: 'Óra',
            minuteText: 'Perc',
            secondText: 'Másodperc',
            millisecText: 'Milliszekundumos',
            timezoneText: 'Időzóna',
            currentText: 'Most',
            closeText: 'Kész',
            timeFormat: 'hh:mm tt',
            amNames: ['de.', 'AM', 'A'],
            pmNames: ['du.', 'PM', 'P'],
            ampm: false,
            isRTL: false
        };
        $.timepicker.setDefaults($.timepicker.regional['hu']);
    }
)(jQuery);