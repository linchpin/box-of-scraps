import jquery from 'jquery';

let $ = jquery;

export default function site() {

    // Private Variables
    let $window = $(window),
        $doc    = $(document),
        $body   = $('body');

    // Clickable
    $body.on('click', '.clickable', function(event) {

        if ( event.target['href'] == null ) {
            event.preventDefault();
            event.stopPropagation();

            var $tgt = $(this),
                $a = $tgt.find('a:first'),
                $btn = $tgt.find('button:first'),
                uri = $a.attr('href'),
                new_window = $tgt.hasClass('external-link') || $a.hasClass('external-link') || $a.attr('target') == '_blank' || event.metaKey || event.ctrlKey;

            if ($btn.length > 0) {
                event.stopImmediatePropagation();
                $btn.trigger('click');
                return;
            }

            if ($btn.length < 1 && $a.length > 0) {
                if (new_window) {
                    window.open(uri);
                } else {
                    window.location = uri;
                }
            }

            return false;
        } else {
            return;
        }
    });
}
