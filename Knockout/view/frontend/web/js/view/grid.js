define([
    'jquery',
    'ko',
    'uiComponent',
    'Kitchen_Knockout/js/view/grid/price'
], function ($, ko, component, priceRender) {
    "use strict";

    return component.extend({
        items: ko.observableArray([]),
        columns: ko.observableArray([]),
        defaults: {
            template: 'Kitchen_Knockout/grid',
        },

        initialize: function () {
            this._super();
            this._render();
        },

        _render: function() {
            this._prepareColumns();
            this._prepareItems();                     
        },

        _prepareItems: function () {
            // var items = [
            //     {id: "1", name: "Yamin", description: "Magento Developer", active: "0"},
            //     {id: "1", name: "Disha", description: "Magento Developer", active: "1"},
            //     {id: "2", name: "Aanchal", description: "Magento Developer", active: "1"},
            //     {id: "3", name: "Raviraaj", description: "Magento Developer", active: "1"},
            //     {id: "4", name: "Pradip", description: "Magento Developer", active: "0"},
            //     {id: "5", name: "Huzaifa", description: "Magento Developer", active: "1"},
            // ];
            this.addItems(window.grid_data);
        },

        _prepareColumns: function () {
            this.addColumn({headerText: "ID", rowText: "news_id", renderer: ''});
            this.addColumn({headerText: "Name", rowText: "news_title", renderer: ''});
            this.addColumn({headerText: "Description", rowText: "news_desc", renderer: ''});
            this.addColumn({headerText: "Active", rowText: "is_active", renderer: ''});
            this.addColumn({headerText: "Create At", rowText: "creation_time", renderer: ''});
            this.addColumn({headerText: "Update At", rowText: "update_time", renderer: ''});
            this.addColumn({headerText: "Admin ID", rowText: "a_id", renderer: ''});
        },

        addItem: function (item) {
            item.columns = this.columns;
            this.items.push(item);
        },

        addItems: function (items) {
            for (var i in items) {
                this.addItem(items[i]);
            }
        },

        addColumn: function (column) {
            this.columns.push(column);
        }
    });
});
