<div class="modal fade" id="addElement" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New Element</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="minerals/add_element.php" method="post">
        <div class="modal-body">

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="name" name="name" placeholder="name" required>
              <label for="floatingInput">Name:</label>
            </div>

            <div class="form-floating mb-3">
              <input type="number" class="form-control" id="groupID" name="groupID" placeholder="groupID" list="groupElements" required>
              <label for="floatingInput">Group ID:</label>
            </div>

            <datalist id="groupElements">
              <option value="1">Metallic</option>
              <option value="2">Non-Metallic</option>
              <option value="3">Metalloids</option>
            </datalist>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="atomicNo" name="atomicNo" placeholder="atomicNo" required>
              <label for="floatingInput">Atomic No:</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="atomicWeight" name="atomicWeight" placeholder="atomicWeight" required>
              <label for="floatingInput">Atomic Weight:</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="description" name="description" placeholder="description">
              <label for="floatingInput">Description: </label>
            </div>

        </div>
        <div class="modal-footer">
          <p text-muted>Note: Please do select the group ID for the element in the box which is pre-defined by the system!</p>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="add" class="btn btn-success">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>