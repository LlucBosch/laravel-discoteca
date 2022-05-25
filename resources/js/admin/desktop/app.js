import {renderMenuButton} from "./menu-button.js"; 
import {renderPanelButton} from "./panel-button.js";
import {renderPanelFilters} from "./panel-filters.js";
import { renderPanelTabs } from "./panel-tabs.js";
import {renderForm} from "./form.js";
import { notificationTransition } from "./notification.js";
import {uploadImage} from "./upload-image.js";
import {renderCkeditor} from "./ckeditor.js";
import {renderTable} from "./table.js"


renderMenuButton();
renderPanelButton();
renderPanelFilters();
renderPanelTabs();
renderForm();
notificationTransition();
uploadImage();
renderCkeditor();
renderTable();