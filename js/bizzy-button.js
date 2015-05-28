(function() {
    tinymce.PluginManager.add('bizzyforms_bzf_button', function( editor, url ) {
        editor.addButton( 'bizzyforms_bzf_button', {
            text: 'Bizzy Forms',
            icon: false,
            onclick: function() {
                editor.insertContent('Hello World!');
            }
        });
    });
})();