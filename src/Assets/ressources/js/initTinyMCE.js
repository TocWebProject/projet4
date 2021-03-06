tinymce.init({
    selector: '#contentNewPost, #contentAddModificationArticle', 
    plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed powerpaste tinymcespellchecker',
    toolbar: 'a11ycheck casechange checklist code',
    toolbar_mode: 'floating',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    language : "fr",
    // Suppresion des <div> lors de l'enregistrement du contenue dans TinyMCE. Sans perdre les autres balises html parents/enfants permettant la mise en page du contenu. 
    valid_elements: "@[id|class|title|style],"
    + "a[name|href|target|title|alt],"
    + "#p,-ol,-ul,-li,br,img[src|unselectable],-sub,-sup,-b,-i,-u,"
    + "-span[data-mce-type],hr",
    
    valid_child_elements : "body[p,ol,ul]"
    + ",p[a|span|b|i|u|sup|sub|img|hr|#text]"
    + ",span[a|b|i|u|sup|sub|img|#text]"
    + ",a[span|b|i|u|sup|sub|img|#text]"
    + ",b[span|a|i|u|sup|sub|img|#text]"
    + ",i[span|a|b|u|sup|sub|img|#text]"
    + ",sup[span|a|i|b|u|sub|img|#text]"
    + ",sub[span|a|i|b|u|sup|img|#text]"
    + ",li[span|a|b|i|u|sup|sub|img|ol|ul|#text]"
    + ",ol[li]"
    + ",ul[li]",
  });