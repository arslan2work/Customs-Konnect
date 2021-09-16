<template>
<!-- eslint-disable vue/no-use-v-if-with-v-for,vue/no-confusing-v-for-v-if -->
  <div>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Company Table</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
          <div class="card-tools">
            <button class="btn btn-success my-2" @click="newModal">
              Add New Company <i class="fas fa-user-plus fa-fw"></i>
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
                      Company Name
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      City
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      State
                    </th>
                    
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      User ID
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
                  <tr class="odd" v-for="user in companies.data" :key="user.id" v-if="tires.id  == user.user_id">
                    <td>{{ user.id }}</td>
                    <td>{{ user.companyName  }}</td>
                    <td>{{ user.city }}</td>
                    <td>{{ user.state}}</td>
                    <td>{{ user.user_id}}</td>
                    <td>
                      <a href="#" @click="editModal(user)">
                        <i class="fa fa-edit"></i>
                      </a>
                      /
                      <a href="#" @click="deleteUser(user.id)">
                        <i class="fa fa-trash text-red"></i>
                      </a>
                    </td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <th rowspan="1" colspan="1">ID</th>
                    <th rowspan="1" colspan="1">Company Name</th>
                    <th rowspan="1" colspan="1">City</th>
                    <th rowspan="1" colspan="1">State</th>
                    <th rowspan="1" colspan="1">User Id</th>
                    <th rowspan="1" colspan="1">Modify</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <div class="card-footer">
              <pagination :data="companies" @pagination-change-page="getResults"></pagination>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
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
              Add New Company
            </h5>
            <h5
              class="modal-title"
              v-show="editmode"
              id="exampleModalLongTitle"
            >
              Edit Company
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
          <form @submit.prevent="editmode ? updateTrailer() : createTrailer()">
            <div class="modal-body">
              <div class="form-group">
                <input
                  v-model="form.companyName"
                  type="text"
                  name="company"
                  class="form-control"
                  placeholder="trailerNumber"
                />
                <div
                  class="text-red"
                  v-if="form.errors.has('company')"
                  v-html="form.errors.get('company')"
                />
              </div>
              <div class="form-group">
                <input
                  v-model="form.city"
                  type="text"
                  name="terminal"
                  class="form-control"
                  placeholder="terminal"
                />
                <div
                  class="text-red"
                  v-if="form.errors.has('terminal')"
                  v-html="form.errors.get('terminal')"
                />
              
              </div>
              
              <div class="form-group">
                <select
                  v-model="form.user_id"
                  name="type"
                  id="LicenseState"
                  class="form-control"
                  placeholder="LicenseState"
                >
                  <option  >{{tires.id}}</option>
                </select>
                <div
                  class="text-red"
                  v-if="form.errors.has('LicenseState')"
                  v-html="form.errors.get('LicenseState')"
                />
              </div>
              <div class="form-group">
                <select
                  v-model="form.state"
                  name="type"
                  id="LicenseState"
                  class="form-control"
                  placeholder="LicenseState"
                >
                  <option value="">Select State</option>
                  <option value="Torronto">Torronto</option>
                  <option value="Alberta">Alberta</option>
                  <option value="Poaram">Poaram</option>
                </select>
                <div
                  class="text-red"
                  v-if="form.errors.has('LicenseState')"
                  v-html="form.errors.get('LicenseState')"
                />
              </div>
              
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                Close
              </button>
              <button v-show="editmode" type="submit" class="btn btn-success">
                Edit Company
              </button>
              <button v-show="!editmode" type="submit" class="btn btn-primary">
                Create Company
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
import Form from "vform";

export default {
  data: () => ({
    editmode: false,
    companies: {},
    tires: {},
    form: new Form({
                companyName: "",
                city: "",
                state: "",
                user_id: "",
    }),
  }),
  methods: {
      getResults(page = 1) {
			axios.get('/api/company?page=' + page)
				.then(response => {
					this.companies = response.data;
				});
		},
    updateTrailer() {
      this.$Progress.start();
      this.form
        .put("/api/company/" + this.form.id)
        .then(() => {
          $("#addnew").modal("hide");
          Toast.fire({
            icon: "success",
            title: "trailer Updated in successfully",
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
              .delete("/api/company/" + id)
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
    load(){
        Promise.all([
            this.loadUser(),
        this.loadTrailer(),
      ])
    },
    loadTrailer() {
        axios.get("/api/company").then(({ data }) => {this.companies = data});
    },
    loadUser() {
        axios.get("/api/getUser").then(({ data }) => {this.tires = data});
    },
    
    createTrailer() {
      this.$Progress.start();
      this.form
        .post("/api/company")
        .then(() => {
          Fire.$emit("afterCreate");
          $("#addnew").modal("hide");
          Toast.fire({
            icon: "success",
            title: "Companies Created in successfully",
          });
          this.$Progress.finish();
        })
        .catch(() => {});
    },
  },
  created() {
            Fire.$on('searching',() => {
                let query = this.$parent.search;
                axios.get('api/findCompany?q=' + query)
                .then((data) => {
                    this.companies = data.data
                })
                .catch(() => {
                })
            })
           this.load();
           Fire.$on('afterCreate',() => {
               this.load();
           });
        //    setInterval(() => this.loadUsers(), 3000);
        }
};
</script>
