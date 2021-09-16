<template>
  <div>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Trailers Table</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
          <div class="card-tools">
            <button class="btn btn-success my-2" @click="newModal">
              Add New Trailer <i class="fas fa-user-plus fa-fw"></i>
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
                      Trailer Number
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      Terminal
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      TrailerType
                    </th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      LicensePlate
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label=""
                    >
                      License State
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
                  <tr class="odd" v-for="user in trailers.data" :key="user.id">
                    <td>{{ user.id }}</td>
                    <td>{{ user.trailerNumber }}</td>
                    <td>{{ user.terminal }}</td>
                    <td>{{ user.trailerType}}</td>
                    <td>{{ user.licensePLate}}</td>
                    <td>{{ user.LicenseState}}</td>
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
                    <th rowspan="1" colspan="1">trailerNumber</th>
                    <th rowspan="1" colspan="1">Terminal</th>
                    <th rowspan="1" colspan="1">TrailerType</th>
                    <th rowspan="1" colspan="1">LicensePlate</th>
                    <th rowspan="1" colspan="1">LicenseState</th>
                    <th rowspan="1" colspan="1">Modify</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <div class="card-footer">
              <pagination :data="trailers" @pagination-change-page="getResults"></pagination>
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
              Add New Trailer
            </h5>
            <h5
              class="modal-title"
              v-show="editmode"
              id="exampleModalLongTitle"
            >
              Edit Trailer
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
                  v-model="form.trailerNumber"
                  type="text"
                  name="natrailerNumberme"
                  class="form-control"
                  placeholder="trailerNumber"
                />
                <div
                  class="text-red"
                  v-if="form.errors.has('trailerNumber')"
                  v-html="form.errors.get('trailerNumber')"
                />
              </div>
              <div class="form-group">
                <input
                  v-model="form.terminal"
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
                <textarea
                  v-model="form.licensePLate"
                  name="text"
                  id="licensePLate"
                  class="form-control"
                  placeholder="licensePLate"
                ></textarea>
                <div
                  class="text-red"
                  v-if="form.errors.has('licensePLate')"
                  v-html="form.errors.get('licensePLate')"
                />
              </div>
              <div class="form-group">
                <select
                  v-model="form.trailerType"
                  name="type"
                  id="trailerType"
                  class="form-control"
                  placeholder="trailerType"
                >
                  <option value="">Select user role</option>
                  <option value="Long">Long</option>
                  <option value="Double">Double</option>
                  <option value="Steep">Steep</option>
                </select>
                <div
                  class="text-red"
                  v-if="form.errors.has('trailerType')"
                  v-html="form.errors.get('trailerType')"
                />
              </div>
              <div class="form-group">
                <select
                  v-model="form.LicenseState"
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
                Edit Trailer
              </button>
              <button v-show="!editmode" type="submit" class="btn btn-primary">
                Create Trailer
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
    trailers: {},
    form: new Form({
      id: "",
      trailerNumber: "",
      terminal: "",
      vehicleType: "",
      licensePLate: "",
      licenseState: "",
    }),
  }),
  methods: {
      getResults(page = 1) {
			axios.get('/api/trailer?page=' + page)
				.then(response => {
					this.trailers = response.data;
				});
		},
    updateTrailer() {
      this.$Progress.start();
      this.form
        .put("/api/trailer/" + this.form.id)
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
    deleteTrailer(id) {
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
              .delete("/api/trailer/" + id)
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
    loadTrailer() {
        axios.get("/api/trailer").then(({ data }) => (this.trailers = data));
    },
    createTrailer() {
      this.$Progress.start();
      this.form
        .post("/api/trailer")
        .then(() => {
          Fire.$emit("afterCreate");
          $("#addnew").modal("hide");
          Toast.fire({
            icon: "success",
            title: "Trailers Created in successfully",
          });
          this.$Progress.finish();
        })
        .catch(() => {});
    },
  },
  created() {
            Fire.$on('searching',() => {
                let query = this.$parent.search;
                axios.get('api/findTrailer?q=' + query)
                .then((data) => {
                    this.trailers = data.data
                })
                .catch(() => {
                })
            })
           this.loadTrailer();
           Fire.$on('afterCreate',() => {
               this.loadTrailer();
           });
        //    setInterval(() => this.loadUsers(), 3000);
        }
};
</script>
