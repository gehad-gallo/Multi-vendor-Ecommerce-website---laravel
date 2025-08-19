
 <label class="custom-switch">
          <input type="checkbox" name="status" value="1"
                 class="custom-switch-input change-status"
                 data-id="{{ $brand->id }}"
                 {{ $brand->status ? 'checked' : '' }}>
          <span class="custom-switch-indicator"></span>
          <span class="custom-switch-description">
              {{ $brand->status ? 'Active' : 'Inactive' }}
          </span>
      </label>