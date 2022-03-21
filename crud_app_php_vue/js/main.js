new Vue({
    el : "#app",
    data : {
        contacts : [],
        contact : {id : '',name : '',tel : ''},
    },
    created() {
        this.getContacts();
    },
    methods: {
        getContacts(){
            axios.get('http://localhost/crud_app_php_vue/getContacts.php')
                .then(response => this.contacts = response.data)
                .catch(err => console.log(err));
        },
        deleteContact(id){
            Swal.fire({
                title: 'Are you sure ?',
                text: "You are going to delete this contact",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText : 'Cancel'
            }).then((result) => {
                if (result.value) {
                    axios.delete('http://localhost/crud_app_php_vue/delete_contact.php?id=' + id)
                        .then(response => {
                            Swal.fire(
                                'Deleted !',
                                'success'
                            ).then(() => {
                                this.contacts = this.contacts.filter(contact => {
                                    return contact.id !== id;
                                })
                            })
                        })
                        .catch(err => console.log(err));
                }
            })
        },
        addContact(){
            if(this.contact.name !== '' && this.contact.tel !== ''){
                axios.post('http://localhost/crud_app_php_vue/add_contact.php',{
                    nom : this.contact.name,
                    tel : this.contact.tel
                })
                .then(response => {
                    Swal.fire(
                        'Added !',
                        'success'
                    ).then(() => {
                        this.getContacts();
                        $('#addContact').modal('hide')
                    })
                })
                .catch(err => console.log(err));
            }else{
                Swal.fire({
                    title : 'Please fill all the fields !',
                    type : 'warning'
                }).then(() => {
                    $('#addContact').modal('show')
                })
            }
        },
        updateContact() {
            axios.put('http://localhost/crud_app_php_vue/update_contact.php', {
                id : this.contact.id,
                nom: this.contact.name,
                tel: this.contact.tel
            })
                .then(response => {
                    Swal.fire(
                        'Updated !',
                        'success'
                    ).then(() => {
                        this.getContacts();
                        $('#updateContact').modal('hide')
                    })
                })
                .catch(err => console.log(err));
        },
        getContact(id) {
            axios.post('http://localhost/crud_app_php_vue/get_contact.php?id=' + id)
                .then(response => {
                    this.contact = response.data;
                })
                .catch(err => console.log(err));
        },
        clearFields(){
            this.contact = {id : '',name : '',tel : ''};
        }
    },
})