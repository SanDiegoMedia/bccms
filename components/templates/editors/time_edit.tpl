<div class="input-group pgui-date-time-edit js-datetime-editor-wrap">
    <input {include file="editors/editor_options.tpl" Editor=$TimeEdit}
            class="form-control"
            type="text"
            value="{$TimeEdit->GetValue()}"
            data-picker-format="HH:mm:ss"
            >
    <span class="input-group-addon" style="cursor: pointer">
        <span class="icon-time"></span>
    </span>
</div>