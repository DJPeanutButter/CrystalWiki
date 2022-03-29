function wikiRedirectWithMessage(a,m) {
    var form = document.createElement("form");
    var message = document.createElement("input");

    form.method = "POST";
    form.action = a;

    message.value = m;
    message.name = "message";
    form.appendChild(message);

    document.body.appendChild(form);

    form.submit();
}