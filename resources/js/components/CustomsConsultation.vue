<template>
<!-- eslint-disable vue/no-use-v-if-with-v-for,vue/no-confusing-v-for-v-if -->

  <div>
    <div class="card" >
      <div class="card-header">
        <h3 class="card-title">Customs Consultation</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
          <div class="card-tools">
              <div class="col-md-8 offset-md-2">
                  <form @submit.prevent="editmode ? updateUser() : createUser()">
            <div class="modal-body">
                
              <div class="form-group">
                <span>Trip Number:</span>
                <input
                  v-model="form.tripNumber"
                  type="text"
                  name="name"
                  class="form-control"
                  placeholder="Username"
                />
                <div
                  class="text-red"
                  v-if="form.errors.has('name')"
                  v-html="form.errors.get('name')"
                />
              </div>
              <div class="form-group">
                <span>Port of Entry:</span>
                <input
                  v-model="form.portOfEntry"
                  type="text"
                  name="text"
                  class="form-control"
                  placeholder="port"
                />
                <div
                  class="text-red"
                  v-if="form.errors.has('email')"
                  v-html="form.errors.get('email')"
                />
              </div>
              <div class="form-group">
                <span>Query</span>
                <textarea
                  v-model="form.query"
                  name="bio"
                  id="bio"
                  class="form-control"
                  placeholder="Bio"
                ></textarea>
                <div
                  class="text-red"
                  v-if="form.errors.has('bio')"
                  v-html="form.errors.get('bio')"
                />
              </div>
              
              
            </div>
            <div class="modal-footer">
              
              
              <button v-show="!editmode" type="submit" class="btn btn-primary">
                Request
              </button>
            </div>
          </form>
              </div>
              
            
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
                <button
                  class="btn btn-secondary buttons-pdf buttons-html5"
                  tabindex="0"
                  aria-controls="example1"
                  type="button"
                >
                  <span>PDF</span>
                </button>
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
            <div class="col-sm-12">
              <table
                id="example1"
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
                      Trip Number
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Port Of Entry
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Query
                    </th>
                    
                    
                  </tr>
                </thead>
                <tbody>
                  <tr class="odd" v-for="user in customs.data" :key="user.id" >
                    <td>{{ user.id }}</td>
                    <td>{{ user.TripNumber }}</td>
                    <td>{{ user.portOfEntry }}</td>
                    <td>{{ user.query }}</td>
                    
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <th rowspan="1" colspan="1">ID</th>
                    <th rowspan="1" colspan="1">Trip Number</th>
                    <th rowspan="1" colspan="1">Port Of Entry</th>
                    <th rowspan="1" colspan="1">Query</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <div class="card-footer">
              <pagination :data="customs" @pagination-change-page="getResults"></pagination>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    



 









    
  </div>
  <!-- Modal -->
</template>

<script>
import VueQrcode from 'vue-qrcode'

import Form from "vform";

export default {
  components: {
    VueQrcode,
  },
  data: () => ({
    editmode: false,
    users: {},
    companies: {},
    acis: {},
    customs: {},
    form: new Form({
      id: "",
      tripNumber: "",
      portOfEntry: "",
      query: "",
    }),
  }),
  methods: {
      getResults(page = 1) {
			axios.get('/api/customs?page=' + page)
				.then(response => {
					this.customs = response.data;
				});
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
              .delete("/api/custom/" + id)
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
        this.loadCustom(),
      ])
      },
      loadCompany() {
        axios.get("/api/company").then(({ data }) => {this.companies = data});
    },
    loadUser() {
        axios.get("/api/getUser").then(({ data }) => {this.users = data});
    },
    loadAci(){
      
      axios.get("/api/aci").then(({ data }) => (this.acis = data));
    },
    loadCustom(){
      
      axios.get("/api/custom").then(({ data }) => (this.customs = data));
    },

    createUser() {
      this.$Progress.start();
      this.form
        .post("/api/custom")
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
                axios.get('api/findcustom?q=' + query)
                .then((data) => {
                    this.customs = data.data
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
