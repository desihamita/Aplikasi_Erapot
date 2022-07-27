<div class="d-flex justify-content-between mt-3">
    <p>Showing {{ $model->firstItem() }} to {{ $model->lastItem() }} of {{ $model->total() }} entries</p>
    {{ $model->links('pagination::bootstrap-4') }}
  </div>
