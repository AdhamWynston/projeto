  <template>
    <div class="custom-actions">
      <button class="tooltipped waves-circle waves-light btn-floating blue" data-tooltip="Visualizar cliente" data-position="top" data-delay="50" @click="itemAction('view-item', rowData, rowIndex)"><i class="material-icons">remove_red_eye</i></button>
      <button class="tooltipped waves-circle waves-light btn-floating orange" data-tooltip="Visualizar cliente" data-position="top" data-delay="50" @click="itemAction('edit-item', rowData, rowIndex)"><i class="material-icons">mode_edit</i></button>
      <button class="tooltipped waves-circle waves-light btn-floating red" data-tooltip="Visualizar cliente" data-position="top" data-delay="50" @click="itemAction('delete-item', rowData, rowIndex)"><i class="material-icons">delete</i></button>
    </div>
  </template>

  <script>
  export default {
    props: {
      rowData: {
        type: Object,
        required: true
      },
      rowIndex: {
        type: Number
      }
    },
    methods: {
      itemAction (action, data, index) {
        console.log('custom-actions: ' + action, data.name, index)
      }
    }
  }
  </script>

  <style>
    .custom-actions button.ui.button {
      padding: 8px 8px;
    }
    .custom-actions button.ui.button > i.icon {
      margin: auto !important;
    }
  </style>
