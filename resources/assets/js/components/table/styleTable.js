export default {
    table: {
        tableClass: ' table highlight ',
        ascendingIcon: ' fa fa-sort-asc ',
        descendingIcon: ' fa fa-sort-desc',
        handleIcon: ' fa fa-bars ',
        renderIcon: function (classes, options) {
            return `<span class="${classes.join(' ')}"></span>`
        }
    },
    pagination: {
        wrapperClass: "pagination pull-right",
        activeClass: "btn-primary",
        disabledClass: "disabled",
        pageClass: "btn btn-border",
        linkClass: "btn btn-border",
        icons: {
            first: "",
            prev: "",
            next: "",
            last: ""
        }
    }
}