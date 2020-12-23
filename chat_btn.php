<style>
.feedback {
  background-color : #31B0D5;
  color: white;
  padding: 10px 20px;
  border-radius: 4px;
  border-color: #46b8da;
}

#mybutton {
  position: fixed;
  bottom: 12px;
  right: 10px;
  z-index:9;
}
</style>

<div id="mybutton">
<button type="button" class="btn btn-outline-primary btn-rounded waves-effect">Primary</button>

    <button class="feedback">Feedback</button>
</div>




<div class="fb-send-to-messenger" 
  messenger_app_id="<APP_ID>" 
  page_id="PAGE_ID" 
  data-ref="<PASS_THROUGH_PARAM>" 
  color="<blue | white>" 
  size="<standard | large | xlarge>">
</div>