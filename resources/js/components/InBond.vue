<template>
<!-- eslint-disable vue/no-use-v-if-with-v-for,vue/no-confusing-v-for-v-if -->

  <div>
    <div class="card" >
      <div class="card-header">
        <h3 class="card-title">In Bond Table</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
          <div class="card-tools">
            <button class="btn btn-success my-2" @click="newModal">
              Add New In Bond <i class="fas fa-user-plus fa-fw"></i>
            </button>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-8">
              <div class="dt-buttons btn-group flex-wrap">
                <button
                  class="btn btn-secondary buttons-copy buttons-html5"
                  tabindex="0"
                  aria-controls="example1"
                  type="button"
                >
                  <span>Copy</span>
                </button>
                <button
                  class="btn btn-secondary buttons-csv buttons-html5"
                  tabindex="0"
                  aria-controls="example1"
                  type="button"
                >
                  <span>CSV</span>
                </button>
                <button
                  class="btn btn-secondary buttons-excel buttons-html5"
                  tabindex="0"
                  aria-controls="example1"
                  type="button"
                >
                  <span>Excel</span>
                </button>
                <a
                  class="btn btn-secondary buttons-pdf buttons-html5"
                  href="#"
                  @click.prevent="printMe"
                  tabindex="0"
                  aria-controls="example1"
                  type="button"
                >
                  <span>PDF</span>
                </a>
                <button
                  class="btn btn-secondary buttons-print"
                  tabindex="0"
                  aria-controls="example1"
                  type="button"
                >
                  <span>Print</span>
                </button>
                <div class="btn-group">
                  <button
                    class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis"
                    tabindex="0"
                    aria-controls="example1"
                    type="button"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <span>Column visibility</span>
                  </button>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-4">
              <div id="example1_filter" class="dataTables_filter">
                <label
                  >Search:
                  <input
                    type="search"
                    class="form-control form-control-md"
                    placeholder=""
                    aria-controls="example1"
                  />
                </label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12" id="">
              <table
                id=""
                class="table table-bordered table-striped dataTable dtr-inline"
                role="grid"
                aria-describedby="example1_info"
              >
                <thead>
                  <tr role="row">
                    <th
                      class="sorting sorting_asc"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-sort="ascending"
                      aria-label=""
                    >
                      ID
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Entry Number
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Bill Of Entry
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Warnings
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Bond Type
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Status
                    </th>
                    
                    
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Modify
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="odd" v-for="user in bonds.data" :key="user.id" v-if="users.company_id  == user.company_id">
                    <td>{{ user.id }}</td>
                    <td>{{ user.entryNumber }}</td>
                    <td>{{ user.bill }}</td>
                    <td>{{ user.warning }}</td>
                    <td>{{ user.type }}</td>
                    <td><span :class="`${user.review == 'Approved' ? 'badge badge-primary' : 'badge badge-danger'}`">{{user.review}}</span></td>
                    <td>
                      <a class="py-2" href="#" @click="displayData(user)">
                        <i class="fas fa-clipboard-list text-green py-2"></i>
                      </a>
                      |
                      <a class="py-2" href="#" @click="editModal(user)">
                        <i class="fa fa-edit py-2"></i>
                      </a>
                      |
                      <a class="py-2" href="#" @click="deleteUser(user.id)">
                        <i class="fa fa-trash text-red py-2"></i>
                      </a>
                      
                      
                    </td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <th rowspan="1" colspan="1">ID</th>
                    <th rowspan="1" colspan="1">Entry Number</th>
                    <th rowspan="1" colspan="1">Bill Of Entry</th>
                    <th rowspan="1" colspan="1">Warnings</th>
                    <th rowspan="1" colspan="1">Type</th>
                    <th rowspan="1" colspan="1">Status</th>
                    <th rowspan="1" colspan="1">Modify</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <div class="card-footer">
              <pagination :data="bonds" @pagination-change-page="getResults"></pagination>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    

    <div
      class="modal fade"
      id="display"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLongTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document" id="printplease">
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="exampleModalLongTitle"
            >
              Data Display
            </h5>
 
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="displayData()">
            <div class="modal-body">
              <div class="d-flex justify-content-center">
              <vue-qrcode value=bonds></vue-qrcode>
              
              </div>
              <div class="d-flex justify-content-center">
              <h3>Customs Connect</h3>
              </div>
              <div class="d-flex justify-content-center">
              <h4>In-Bond Reciept</h4>
              </div>
              <form >
                <div class="row">
                  <div class="col-md-4">
                    <h5 class="py-2">Bond ID:</h5>
                    <h5 class="py-2">Entry Number:</h5>
                    <h5 class="py-2">Bill Of Entry:</h5>
                    <h5 class="py-2">Warnings:</h5>
                    <h5 class="py-2">Bond Type:</h5>
                  </div>
                  <div class="col-md-8">
                    <div class="pb-2">
                      <input 
                        class="form-control"  
                        v-model="form.id" 
                        id="disabledInput" 
                        type="text" 
                        disabled>

                    </div>
                    <div class="pb-2">
                      <input 
                        class="form-control"  
                        v-model="form.entryNumber"
                        type="text" 
                        disabled>

                    </div>
                    <div class="pb-2">
                      <input 
                        class="form-control"  
                        v-model="form.bill" 
                        type="text" 
                        disabled>

                    </div>
                    <div class="pb-2">
                      <input 
                        class="form-control"  
                        v-model="form.warning"
                        type="text" 
                        disabled>

                    </div>
                    <div class="pb-2">
                      <input 
                        class="form-control"  
                        v-model="form.type"
                        type="text" 
                        disabled>

                    </div>
                    <a
                  class="btn btn-secondary buttons-pdf buttons-html5"
                  href="#"
                  @click.prevent="printMe"
                  tabindex="0"
                  aria-controls="example1"
                  type="button"
                >
                  <span>PDF</span>
                </a>
                    

                  </div>
                </div>
                

              </form>
              
            </div>
            <div class="modal-footer">
             
              
            </div>
          </form>
        </div>
      </div>
    </div>





    <div
      class="modal fade"
      id="addnew"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLongTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              v-show="!editmode"
              id="exampleModalLongTitle"
            >
              Add New In Bond
            </h5>
            <h5
              class="modal-title"
              v-show="editmode"
              id="exampleModalLongTitle"
            >
              Edit In Bond
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="editmode ? updateUser() : createUser()">
            <div class="modal-body">
              <div class="form-group">


                <span>Entry Number:</span>
                <input
                  v-model="form.entryNumber"
                  type="text"
                  name="name"
                  class="form-control"
                  placeholder=""
                />
                <div
                  class="text-red"
                  v-if="form.errors.has('name')"
                  v-html="form.errors.get('name')"
                />
              </div>
              <div class="form-group">
                <span>Bill of Entry:</span>
                <input
                  v-model="form.bill"
                  type="text"
                  name="text"
                  class="form-control"
                  placeholder=""
                />
                <div
                  class="text-red"
                  v-if="form.errors.has('email')"
                  v-html="form.errors.get('email')"
                />
              </div>
              
              <div class="form-group">
                <span>Warnings:</span>
                <select
                  v-model="form.warning"
                  name="type"
                  id="type"
                  class="form-control"
                  placeholder=""
                >
                
                  <option  value="Yes" >Yes</option>
                  <option  value="No">No</option>
                </select>
                <div
                  class="text-red"
                  v-if="form.errors.has('type')"
                  v-html="form.errors.get('type')"
                />
              </div>
              <div class="form-group">
                <span>Company ID:</span>
                <select
                  v-model="form.company_id"
                  name="type"
                  id="LicenseState"
                  class="form-control"
                  placeholder=""
                >
                  <option  >{{users.company_id}}</option>
                </select>
                <div
                  class="text-red"
                  v-if="form.errors.has('LicenseState')"
                  v-html="form.errors.get('LicenseState')"
                />
              </div>
              <div class="form-group">
                <span>Type of In-Bond:</span>
                <select
                  v-model="form.type"
                  name="type"
                  id="type"
                  class="form-control"
                  placeholder=""
                >
                
                  <option  value="Transportation">Transportation</option>
                  <option  value="Exportation">Exportation</option>
                  <option  value="Transportation And Exportation">Transportation And Exportation</option>
                </select>
                <div
                  class="text-red"
                  v-if="form.errors.has('type')"
                  v-html="form.errors.get('type')"
                />
              </div>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                Close
              </button>
              <button v-show="editmode" type="submit" class="btn btn-success">
                Edit In Bond
              </button>
              <button v-show="!editmode" type="submit" class="btn btn-primary">
                Create In Bond
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
</template>

<script>
import VueQrcode from 'vue-qrcode'

import Form from "vform";
import NotFound from "./NotFound.vue";

export default {
  components: {
    VueQrcode,
  },
  data: () => ({
    editmode: false,
    bonds: {},
    
    users: {},
    companies: {},
    form: new Form({
      id: "",
      entryNumber: "",
      bill: "",
      warning: "",
      type: "",
            company_id: "",
    }),
  }),
  methods: {
    async printMe() {
      // Pass the element id here
      await this.$htmlToPaper('printplease');
    },
      getResults(page = 1) {
			axios.get('/api/bond?page=' + page)
				.then(response => {
					this.bonds = response.data;
				});
		},
    updateUser() {
      this.$Progress.start();
      this.form
        .put("/api/bond/" + this.form.id)
        .then(() => {
          $("#addnew").modal("hide");
          Toast.fire({
            icon: "success",
            title: "User Updated in successfully",
          });
          this.$Progress.finish();
          Fire.$emit("afterCreate");
        })
        .catch(() => {
          this.$Progress.fail();
        });
    },
    editModal(user) {
      this.editmode = true;
      this.form.clear();
      this.form.reset();
      $("#addnew").modal("show");
      this.form.fill(user);
    },
    newModal() {
      this.editmode = false;
      this.form.clear();
      this.form.reset();
      $("#addnew").modal("show");
    },
    displayData(user){
      $("#display").modal("show");
      this.form.fill(user);

    },
    deleteUser(id) {
      swal
        .fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!",
        })
        .then((result) => {
          //send request to server
          if (result.isConfirmed) {
            this.form
              .delete("/api/bond/" + id)
              .then(() => {
                swal.fire("Deleted!", "Your file has been deleted.", "success");
                Fire.$emit("afterCreate");
              })
              .catch(() => {
                swal("Failed", "There was something wrong", "warning");
              });
          }
        });
    },
    loadUsers() {
      Promise.all([
        this.loadUser(),
        this.loadCompany(),
        this.loadAci(),
      ])
      },
       loadCompany() {
        axios.get("/api/company").then(({ data }) => {this.companies = data});
    },
    loadUser() {
        axios.get("/api/getUser").then(({ data }) => {this.users = data});
    },
    loadAci(){
      
      axios.get("/api/bond").then(({ data }) => (this.bonds = data));
    },
    createUser() {
      this.$Progress.start();
      this.form
        .post("/api/bond")
        .then(() => {
          Fire.$emit("afterCreate");
          $("#addnew").modal("hide");
          Toast.fire({
            icon: "success",
            title: "User Created in successfully",
          });
          this.$Progress.finish();
        })
        .catch(() => {});
    },
  },
  created() {
            Fire.$on('searching',() => {
                let query = this.$parent.search;
                axios.get('api/findBond?q=' + query)
                .then((data) => {
                    this.bonds = data.data
                })
                .catch(() => {
                })
            })
           this.loadUsers();
           
           Fire.$on('afterCreate',() => {
               this.loadUsers();
           });
        //    setInterval(() => this.loadUsers(), 3000);
        }
};
</script>
