<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <title>Creating mathematical and chemical formulas with MathType</title>
    {{-- <script src="https://cdn.ckeditor.com/4.16.1/standard-all/ckeditor.js"></script> --}}
    <script src="{{ URL::asset('public/ckeditor1/ckeditor.js') }}"></script>
    <link href="{{ URL::asset('./public/css/styles.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <textarea cols="3" id="editor1" name="editor1" rows="4" data-sample-short></textarea>
            </div>
        </div>
    </div>
    <script>
        (function() {
            var mathElements = [
                'math',
                'maction',
                'maligngroup',
                'malignmark',
                'menclose',
                'merror',
                'mfenced',
                'mfrac',
                'mglyph',
                'mi',
                'mlabeledtr',
                'mlongdiv',
                'mmultiscripts',
                'mn',
                'mo',
                'mover',
                'mpadded',
                'mphantom',
                'mroot',
                'mrow',
                'ms',
                'mscarries',
                'mscarry',
                'msgroup',
                'msline',
                'mspace',
                'msqrt',
                'msrow',
                'mstack',
                'mstyle',
                'msub',
                'msup',
                'msubsup',
                'mtable',
                'mtd',
                'mtext',
                'mtr',
                'munder',
                'munderover',
                'semantics',
                'annotation',
                'annotation-xml'
            ];

            CKEDITOR.plugins.addExternal('ckeditor_wiris',
                'https://ckeditor.com/docs/ckeditor4/4.16.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

            CKEDITOR.replace('editor1', {
                filebrowserBrowseUrl: "{{ URL::asset('ckfinder_browser') }}",
                extraPlugins: 'ckeditor_wiris',
                // For now, MathType is incompatible with CKEditor file upload plugins.
                removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
                height: 320,
                // Update the ACF configuration with MathML syntax.
                extraAllowedContent: mathElements.join(' ') +
                    '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
            });
        }());
    </script>
    @include('ckfinder::setup')
</body>

</html>
