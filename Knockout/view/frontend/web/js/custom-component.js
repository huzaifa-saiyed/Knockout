define(
    [
        'jquery', 
        'uiComponent', 
        'ko'
    ], function (
        $, 
        Component, 
        ko
    ) {
        'use strict';
        return Component.extend({
            defaults: {
                template: 'Kitchen_Knockout/knockout-test'
            },
            
            initialize: function () {
            this.customerName = ko.observableArray([]);
            this.customerData = ko.observable('');
                this._super();
            },

            removeCustomer: function() {
                this.customerName.pop();
            },

            removeAllCustomer: function(key) {
                if(key >= 0 && key < this.customerName().length) {
                    this.customerName.splice(key, 1);
                }
            },

            addNewCustomer: function () {
                this.customerName.push({name:this.customerData()});
                this.customerData('');
            }
        });
    }
);