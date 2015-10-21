<script src="/javascripts/application.js" type="text/javascript" charset="utf-8" async defer>
    
    var fontfaceobserver = require('fontfaceobserver');
    var fontObservers = [];
    var fontFamilies = {
        'Roboto Condensed': [
            {
                weight: 300
            }
        ],
        'Baskerville': [
            {
                weight: 300
            }
        ]
    }

    Object.keys(fontFamilies).forEach(function(family) {
        fontObservers.push(fontFamilies[family].map(function(config) {
            return new FontFaceObserver(family, config).check()
        }));
    });

    Promise.all(fontObservers)
        .then(function() {
            document.documentElement.classList.add('webfont-loaded');
        }, function() {
            console.info('Web fonts could not be loaded in time. Falling back to system fonts.');
    });
</script>

<style type="text/css" media="screen">
    body {
        font-family: 'Baskerville', sans-serif;
    }

    .webfont-loaded body {
        font-family: 'Baskerville', sans-serif;
    }
</style>

<link rel="preload" href="https://sonlia.com.au/wp-content/themes/workstation-pro/fonts/librebaskerville-regular-webfont.woff">
<link rel="preload" href="https://sonlia.com.au/wp-content/themes/workstation-pro/fonts/robotocondensed-light-webfont.woff">
<link rel="preload" href="https://sonlia.com.au/wp-content/themes/workstation-pro/fonts/robotocondensed-bold-webfont.woff">

<!--#if expr="$HTTP_COOKIE=/webfont-loaded=true/" -->
<html lang="en" class="webfont-loaded">
<!--#else -->
<html lang="en">
<!--#endif -->
