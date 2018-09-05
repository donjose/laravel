CKEDITOR.plugins.add( 'abbr', {
    icons: 'abbr',
    requires: ['fakeobjects'],
    getPlaceholderCss : function () {
        return 'img.cke_wordpress_more'
            + '{'
            + 'background-image: url(' + CKEDITOR.getUrl(this.path + 'icons/more_bug.gif') + ');'
            + 'background-position: right center;'
            + 'background-repeat: no-repeat;'
            + 'clear: both;'
            + 'display: block;'
            + 'float: none;'
            + 'width: 100%;'
            + 'border-top: #999999 1px dotted;'
            + 'height: 10px;'
            + '}'
    },
    onLoad : function () {
        // version 4 - add the styles that renders our fake objects
        if (CKEDITOR.addCss) {
            CKEDITOR.addCss(this.getPlaceholderCss());
        }
    },
    init: function( editor ) {
        editor.ui.addButton( 'Abbr', {
            label: 'Insert Read More',
            command: 'insertMore',
            toolbar: 'custom'
        });
        editor.addCommand( 'insertMore', {
            exec: function( editor ) {
                var images = editor.document.getElementsByTag('img');
                for (var i = 0, len = images.count() ; i < len ; i++ ) {
                    var img = images.getItem(i);
                    if (img.hasClass('cke_wordpress_more')) {
                        var msg = 'The document already contains a more. '
                            + 'Do you want to proceed by removing it first?'
                        if (confirm(msg)) {
                            img.remove();
                            break;
                        } else {
                            return;
                        }
                    }
                }
                insertComment('more');
            }
        });

        // This function effectively inserts the comment into the editor.
        function insertComment(text)
        {
            // Create the fake element that will be inserted into the document.
            // The trick is declaring it as an <hr>, so it will behave like a
            // block element (and in effect it behaves much like an <hr>).
            if (!CKEDITOR.dom.comment.prototype.getAttribute) {
                CKEDITOR.dom.comment.prototype.getAttribute = function () { return ''; };
                CKEDITOR.dom.comment.prototype.attributes = { align: '' };
            }
            var fakeElement = editor.createFakeElement(
                new CKEDITOR.dom.comment(text),
                'cke_wordpress_' + text,
                'hr'
            );

            // This is the trick part. We can't use editor.insertElement()
            // because we need to put the comment directly at <body> level.
            // We need to do range manipulation for that.

            // Get a DOM range from the current selection.
            var range = editor.getSelection().getRanges()[0],
                elementsPath = new CKEDITOR.dom.elementPath(range.getCommonAncestor(true)),
                element = (elementsPath.block && elementsPath.block.getParent()) || elementsPath.blockLimit,
                hasMoved;

            // If we're not in <body> go moving the position to after the
            // elements until reaching it. This may happen when inside tables,
            // lists, blockquotes, etc.
            while (element && element.getName() != 'body') {
                range.moveToPosition(element, CKEDITOR.POSITION_AFTER_END);
                hasMoved = 1;
                element = element.getParent();
            }

            // Commented out to prevent wrapping of blocks before and after More tag
            // Split the current block.
            // if (!hasMoved) {
            // range.splitBlock('span');
            // }

            // Insert the fake element into the document.
            range.insertNode(fakeElement);

            // Now, we move the selection to the best possible place following
            // our fake element.
            var next = fakeElement;
            while ((next = next.getNext()) && !range.moveToElementEditStart(next)) {
                // do nothing
            }

            range.select();
        } // end function insertComment

    },

    afterInit: function (editor) {
        // Adds the comment processing rules to the data filter, so comments
        // are replaced by fake elements.
        editor.dataProcessor.dataFilter.addRules({
            comment: function (value) {
                if (!CKEDITOR.htmlParser.comment.prototype.getAttribute) {
                    CKEDITOR.htmlParser.comment.prototype.getAttribute = function() { return ''; };
                    CKEDITOR.htmlParser.comment.prototype.attributes = { align: '' };
                }
                if (value == 'more') {
                    return editor.createFakeParserElement(
                        new CKEDITOR.htmlParser.comment(value),
                        'cke_wordpress_' + value,
                        'hr'
                    );
                }
                return value;
            }
        });
    } // end function afterInit
});