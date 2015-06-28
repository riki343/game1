(function () {
    angular.module('query').controller('SpinnerController', SpinnerController);

    SpinnerController.$inject = [
        'spinnerService'
    ];

    function SpinnerController($spinner) {
        var self = this;
        this.spinner = false;
        this.showProgress = false;
        this.progress = 0;

        $spinner.onPromisesStart(function () {
            self.spinner = true;
            self.showProgress = false;
        });

        $spinner.onPromisesEnd(function () {
            self.spinner = false;
            self.showProgress = false;
            self.progress = 0;
        });

        $spinner.onProgressChanged(function (progress) {
            self.progress = progress;
            self.showProgress = true;
        });
    }
})();