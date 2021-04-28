var application = new Vue({
    el: '#crudApp',
    data: {
        allData: '',
        myModel: false,
        actionButton: 'Insert',
        dynamicTitle: 'Add Data',
    },
    methods: {
        fetchAllData: function () {
            axios.post('includes/enrollClass.inc.php', {
                action: 'fetchall'
            }).then(function (response) {
                application.allData = response.data;
            });
        },
        openModel: function () {
            application.classID = '';
            application.actionButton = "Insert";
            application.dynamicTitle = "Enroll to a Class";
            application.myModel = true;
        },
        submitData: function () {
            if (application.classID != '' && application.customerID != '') {
                if (application.actionButton == 'Insert') {
                    axios.post('includes/enrollClass.inc.php', {
                        action: 'insert',
                        classID: application.classID,
                        customerID: application.customerID
                    }).then(function (response) {
                        application.myModel = false;
                        application.fetchAllData();
                        application.classID = '';
                        application.customerID = '';
                        alert(response.data.message);
                    });
                }
            }
            else {
                alert("Fill All Field");
            }
        }     
    },
    created: function () {
        this.fetchAllData();
    }
});