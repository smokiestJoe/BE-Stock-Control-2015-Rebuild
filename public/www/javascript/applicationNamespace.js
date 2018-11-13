// Top level namespace
// Last linted 31.10.18 - J.Rose
;
var applicationNamespace = applicationNamespace || {};

function extendNamespace (ns , ns_string)
{
    "use strict";

    var parts = ns_string.split(".");

    var parent = ns;

    var partsLength;

    var count;

    if (parts[0] === "applicationNamespace") {
        parts = parts.slice(1);
    }

    partsLength = parts.length;

    for (count = 0; count < partsLength; count += 1) {

        if (parent[parts[count]] === undefined) {

            parent[parts[count]] = {};
        }

        parent = parent[parts[count]];
    }

    return parent;
}
