<?php include('./includes/header.php'); ?>
<div id="app">
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-8 mx-auto">
                <div class="p-3">
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addContact" @click="clearFields()">Add new</button>
                </div>
                <div class="card card-primary">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody v-for="contact in contacts">
                                <tr key="index">
                                    <td>{{contact.id}}</td>
                                    <td scope="row">{{contact.name}}</td>
                                    <td>{{contact.tel}}</td>
                                    <td>
                                        <a @click="getContact(contact.id)"
                                            data-toggle="modal" data-target="#updateContact"
                                            class="btn btn-sm btn-warning text-white">Update</a>
                                        <a @click="deleteContact(contact.id)" class="btn btn-sm btn-danger text-white">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Add Modal -->
    <div class="modal fade" id="addContact" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add new contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        
                        <div class="form-group">
                            <input type="text" required placeholder="Name" v-model="contact.name" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" required placeholder="Phone" v-model="contact.tel" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-sm btn-success " @click="addContact()">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Update Modal -->
    <div class="modal fade" id="updateContact" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                            <input type="text" required placeholder="Name" v-model="contact.name" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" required placeholder="Phone" v-model="contact.tel" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-sm btn-success" @click="updateContact()">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('./includes/footer.php'); ?>