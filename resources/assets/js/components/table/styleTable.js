export default {
    table: {
        tableClass: ' table highlight responsive-table',
        ascendingIcon: ' fa fa-sort-asc ',
        descendingIcon: ' fa fa-sort-desc',
        handleIcon: ' fa fa-bars ',
        renderIcon: function (classes, options) {
            return `<span class="${classes.join(' ')}"></span>`
        }
    },
    pagination: {
        wrapperClass: "pagination",
        activeClass: "active",
        disabledClass: "disabled",
        pageClass: "page",
        linkClass: "link",
        icons: {
            first: "",
            prev: "",
            next: "",
            last: ""
        }
    }
}