/**************
 *
 * When framework is not allowed, then create small library.
 *
 *More info , comments don't need. same/ similar functions as JQuery.
 *
 * @param selector
 *
 */

function MagicUnicorn(selector) {
    const self = {

        element: document.querySelectorAll(selector),

        letDataFlyAwayViaAjaxPostRequest: function (url, data) {
            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", url, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(data);
            return this;
        },

        appendHtml: (where, htmlCodeToAppend) => {
            self.each(function (item) {
                item.insertAdjacentHTML(where, htmlCodeToAppend);
            });
            return this;
        },

        on: (event, callback) => {
            self.each(function (item) {
                item.addEventListener(event, callback);
            });
            return this;
        },

        click: (callback) => {
            self.each(function (item) {
                item.addEventListener("click", callback);
            });
            return this;
        },

        getValue: () => {
            let value;
            self.each(function (item) {
                value = item.value;
            });
            return value;
        },

        setValue: (valueToSet) => {
            self.each(function (item) {
                item.value = valueToSet;
            });
            return this;
        },

        css: (attribute, value) => {
            self.each(function (item) {
                item.style[attribute] = value;
            });
            return this;
        },

        hide: () => {
            self.each(function (item) {
                item.style.display = "none";
            });
            return this;
        },

        showInline: () => {
            self.each(function (item) {
                item.style.display = "inline";
            });
            return this;
        },

        src: (strLocation) => {
            self.each(function (item) {
                item.src = (strLocation);
            });
            return this;
        },

        addClass: (className) => {
            self.each(function (item) {
                item.classList.add(className);
            });
            return this;
        },

        removeClass: (className) => {
            self.each(function (item) {
                item.classList.remove(className);
            });
            return this;
        },

        submit: function () {
            self.each(function (item) {
                item.submit();
            });
            return this;
        },

        each: function (callback) {
            if (!callback || typeof callback !== 'function') return;
            for (var i = 0; i < this.element.length; i++) {
                callback(this.element[i], i);
            }
            return this;
        },

        grabFormValues: function () {
            var serialized = [];

            self.each(function (item) {
                // Setup our serialized data


                // Loop through each field in the form
                for (var i = 0; i < item.elements.length; i++) {

                    var field = item.elements[i];

                    // Don't serialize fields without a name, submits, buttons, file and reset inputs, and disabled fields
                    if (!field.name || field.disabled || field.type === 'file' || field.type === 'reset' || field.type === 'submit' || field.type === 'button') continue;

                    // If a multi-select, get all selections
                    if (field.type === 'select-multiple') {
                        for (var n = 0; n < field.options.length; n++) {
                            if (!field.options[n].selected) continue;
                            serialized.push(encodeURIComponent(field.name) + "=" + encodeURIComponent(field.options[n].value));
                        }
                    }

                    // Convert field data to a query string
                    else if ((field.type !== 'checkbox' && field.type !== 'radio') || field.checked) {
                        serialized.push(encodeURIComponent(field.name) + "=" + encodeURIComponent(field.value));
                    }
                }
            });
            return serialized.join('&');
        },

    };

    return self;
}
