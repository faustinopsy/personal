const markdown = new SimpleMDE({
    element: document.getElementById("content"),
    spellChecker: false,
	preview:true,
    autosave: {
        enabled: false,
        unique_id: "content",
    },
    
});
if (!window.location.href.includes("admin")) {
    markdown.togglePreview();
	markdown.gui.toolbar.style.display = "none";
}