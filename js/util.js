var foxkeh =
{
  pageOnClick: function(event)
  {
    var t = event.target;
    var h = ["foxkeh.jp", "www.foxkeh.com"];
    if (t.href != "undefined" && h.indexOf(t.hostname) != -1
      && t.pathname.match(/\.(png|gif|jpg|svg|pdf|doc|xls|ppt|zip|xpi|jar)$/)) {
        this.pageTracker._trackPageview(t.pathname);
    }
  }
}

window.onclick = function(event) { foxkeh.pageOnClick(event); }
