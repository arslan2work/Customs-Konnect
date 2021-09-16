<template>
  <div>
    <div class="card" >
      <div class="card-header">
        <h3 class="card-title">Users Table</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
          <div class="card-tools">
            <button class="btn btn-success my-2" @click="newModal">
              Add New Driver <i class="fas fa-user-plus fa-fw"></i>
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
                      Name
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Employee Number
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Gender
                    </th>
                    
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Citizenship
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Document Number
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Type
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
                      Modify
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="odd" v-for="user in drivers.data" :key="user.id">
                    <td>{{ user.id }}</td>
                    <td>{{ user.fullName }}</td>
                    <td>{{ user.employeeNumber }}</td>
                    <td>{{ user.gender }}</td>
                    <td>{{ user.citizenship }}</td>
                    <td>{{ user.documentNumber }}</td>
                    <td>{{ user.type }}</td>
                    <td>{{ user.state }}</td>
                    <td>
                      <a href="#" @click="editModal(user)">
                        <i class="fa fa-edit"></i>
                      </a>
                      /
                      <a href="#" @click="deleteDriver(user.id)">
                        <i class="fa fa-trash text-red"></i>
                      </a>
                    </td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <th rowspan="1" colspan="1">ID</th>
                    <th rowspan="1" colspan="1">Name</th>
                    <th rowspan="1" colspan="1">Employee Number</th>
                    <th rowspan="1" colspan="1">Gender</th>
                    <th rowspan="1" colspan="1">Citizenship</th>
                    <th rowspan="1" colspan="1">Document Number</th>
                    <th rowspan="1" colspan="1">Type</th>
                    <th rowspan="1" colspan="1">State</th>
                    <th rowspan="1" colspan="1">Modify</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <div class="card-footer">
              <pagination :data="drivers" @pagination-change-page="getResults"></pagination>
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
              Add New Driver
            </h5>
            <h5
              class="modal-title"
              v-show="editmode"
              id="exampleModalLongTitle"
            >
              Edit Driver
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
          <form @submit.prevent="editmode ? updateDriver() : createDriver()">
            <div class="modal-body">
              <div class="form-group">
                <input
                  v-model="form.fullName"
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
                <input
                  v-model="form.employeeNumber"
                  type="text"
                  name="employeeNumber"
                  class="form-control"
                  placeholder="employeeNumber"
                />
                <div
                  class="text-red"
                  v-if="form.errors.has('employeeNumber')"
                  v-html="form.errors.get('employeeNumber')"
                />
              </div>
              
              <div class="form-group">
                <select
                  v-model="form.gender"
                  name="type"
                  id="type"
                  class="form-control"
                  placeholder="Gender"
                >
                  <option value="">Select Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
                <div
                  class="text-red"
                  v-if="form.errors.has('type')"
                  v-html="form.errors.get('type')"
                />
              </div>
              <div class="form-group">
                <select
                  v-model="form.citizenship"
                  name="type"
                  id="type"
                  class="form-control"
                  placeholder="Bio"
                >
                  <option value="">Select Citizenship</option>
                  <option value="Canada">Canada</option>
                  <option value="US">US</option>
                  <option value="Mexico">Mexico</option>
                </select>
                <div
                  class="text-red"
                  v-if="form.errors.has('type')"
                  v-html="form.errors.get('type')"
                />
              </div>
              <div class="form-group">
                <select
                  v-model="form.type"
                  name="type"
                  id="type"
                  class="form-control"
                  placeholder="Bio"
                >
                  <option value="">Select Document Type</option>
                  <option value="Green Card">Green Card</option>
                  <option value="Passport">Passport</option>
                </select>
                <div
                  class="text-red"
                  v-if="form.errors.has('type')"
                  v-html="form.errors.get('type')"
                />
              </div>
              <div class="form-group">
                <input
                  v-model="form.documentNumber"
                  type="text"
                  name="password"
                  class="form-control"
                  placeholder="Document Numner"
                />
                <div
                  class="text-red"
                  v-if="form.errors.has('password')"
                  v-html="form.errors.get('password')"
                />
              </div>
              <div class="form-group">
                <select
                  v-model="form.state"
                  name="type"
                  id="type"
                  class="form-control"
                  placeholder="Bio"
                >
                  <option value="">Select State</option>
                  <option value="Torronto">Torronto</option>
                  <option value="Albert">Albert</option>
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
                Edit Driver
              </button>
              <button v-show="!editmode" type="submit" class="btn btn-primary">
                Create Driver
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
import NotFound from "./NotFound.vue";

export default {
  data: () => ({
    editmode: false,
    drivers: {},
    form: new Form({
      id: "",
      fullName: "",
      employeeNumber: "",
      gender: "",
      citizenship: "",
      documentNumber: "",
      type: "",
      state: "",
    }),
  }),
  methods: {
      getResults(page = 1) {
			axios.get('/api/driver?page=' + page)
				.then(response => {
					this.drivers = response.data;
				});
		},
    updateDriver() {
      this.$Progress.start();
      this.form
        .put("/api/driver/" + this.form.id)
        .then(() => {
          $("#addnew").modal("hide");
          Toast.fire({
            icon: "success",
            title: "Driver Updated in successfully",
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
    deleteDriver(id) {
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
              .delete("/api/driver/" + id)
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
    loadDriver() {
        axios.get("/api/driver").then(({ data }) => (this.drivers = data));
    },
    createDriver() {
      this.$Progress.start();
      this.form
        .post("/api/driver")
        .then(() => {
          Fire.$emit("afterCreate");
          $("#addnew").modal("hide");
          Toast.fire({
            icon: "success",
            title: "Driver Created in successfully",
          });
          this.$Progress.finish();
        })
        .catch(() => {});
    },
  },
  created() {
            Fire.$on('searching',() => {
                let query = this.$parent.search;
                axios.get('api/findDriver?q=' + query)
                .then((data) => {
                    this.drivers = data.data
                })
                .catch(() => {
                })
            })
           this.loadDriver();
           Fire.$on('afterCreate',() => {
               this.loadDriver();
           });
        //    setInterval(() => this.loadDriver(), 3000);
        }
};
</script>
