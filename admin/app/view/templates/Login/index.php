<script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/json_functions.js"></script>
<script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/mascaras.js"></script>
<script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/jquery.js"></script>
<script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/jquery_ui.js" ></script>
<script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/ajaxupload.js" ></script>
<script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/libs/modernizr-1.7.min.js"></script>
<script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/ajax/http_request.js"></script>

<form id="form_login" name="form_login" action="javascript:acao('{view}$URL_DEFAULT{/view}login/logado', 'form_login', '{view}$URL_DEFAULT{/view}admin/logado', new Array('Enviar', 'Aguarde...'))" method="post">
<!-- <form id="form_login" name="form_login" action="{view}$URL_DEFAULT{/view}login/logado" method="post"> -->
    <fieldset>
        <dl>
            <dt><label>Login:</label></dt>

            <dd>
                <input type="text" name="txt_login" id="txt_login" maxlength="20" />
                <span id="msg_erro_login"></span>
            </dd>

            <dt><label>Senha:</label></dt>

            <dd>
                <input type="password" name="txt_senha" id="txt_senha" maxlength="20" />
                <span id="msg_erro_senha"></span>
            </dd>
        </dl>
    </fieldset>

    <button type="submit" id="btn_enviar" />Enviar</button>
</form>