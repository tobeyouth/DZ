<div class="container">
        <!-- 左侧 -->
        <div class="col-md-6">
                <div class="clearfix">
                        <h2>Your Form</h2>
                        <hr>
                        <div id="build">
                                <form id="target" class="form-horizontal">
                                        <fieldset>
                                                <div id="legend" class="component" rel="popover" trigger="manual" data-content="
                                &lt;form class='form'&gt;
                                  &lt;div class='controls'&gt;
                                        &lt;label class=''&gt;Title&lt;/label&gt; &lt;input class='form-control' type='text' name='title' id='text'&gt;
                                        &lt;hr/&gt;
                                        &lt;button class='btn btn-info'&gt;Save&lt;/button&gt;&lt;button class='btn btn-danger'&gt;Cancel&lt;/button&gt;
                                  &lt;/div&gt;
                                &lt;/form&gt;" data-original-title="Form Title">
                                                        <legend id="DZ_formName" class="valtype" data-valtype="text">表单名</legend>
                                                </div>
                                        </fieldset>
                                </form>
                        </div>
                </div>
                <!-- 按钮 -->
                <div class="clearfix btn-box">
                        <a href="" class="btn btn-primary btn-lg" id="DZ_formSave">
                                保存
                        </a>
                </div>
        </div>
        <!-- 右侧 -->
        <div class="col-md-6">
                <h2>拖拽下面的组件到左侧</h2>
                <hr>
                <div class="tabbable">
                        <ul class="nav nav-tabs" id="navtab">
                                <li class="active"><a href="#1" data-toggle="tab">输入框</a>
                                </li>
                                <li class=""><a href="#2" data-toggle="tab">Select</a>
                                </li>
                                <li class=""><a href="#3" data-toggle="tab">Checkbox / Radio</a>
                                </li>
                                <li class=""><a href="#4" data-toggle="tab">文件 / 按钮</a>
                                </li>
                                <li class=""><a id="sourcetab" href="#5" data-toggle="tab">生成代码</a>
                                </li>
                        </ul>
                        <form class="form-horizontal" id="components">
                                <fieldset>
                                        <div class="tab-content">

                                                <div class="tab-pane active" id="1">

                                                        <div class="form-group component" data-type="text" rel="popover" title="Text Input" trigger="manual" data-content="
                                  &lt;form class='form'&gt;
                                        &lt;div class='controls'&gt;
                                          &lt;label class=''&gt;Label Text&lt;/label&gt; &lt;input class='form-control' type='text' name='label' id='label'&gt;
                                          &lt;label class=''&gt;form-control Placeholder&lt;/label&gt; &lt;input type='text' class='form-control' name='placeholder' class='form-control' id='placeholder'&gt;
                                          &lt;label class=''&gt;Help Text&lt;/label&gt; &lt;input type='text' name='help' class='form-control' class='form-control' id='help'&gt;
                                          &lt;hr/&gt;
                                          &lt;button class='btn btn-info'&gt;Save&lt;/button&gt;&lt;button class='btn btn-danger'&gt;Cancel&lt;/button&gt;
                                        &lt;/div&gt;
                                  &lt;/form&gt;">

                                                                <!-- Text input-->
                                                                <label class="col-md-3 control-label valtype" for="input01" data-valtype="label">Text input</label>
                                                                <div class="col-md-7 controls">
                                                                        <input type="text" placeholder="placeholder" class="form-control valtype" data-valtype="placeholder">
                                                                        <p class="help-block valtype" data-valtype="help">Supporting help text</p>
                                                                </div>
                                                        </div>


                                                        <div class="form-group component" data-type="search" rel="popover" title="Search Input" trigger="manual" data-content="
                                  &lt;form class='form'&gt;
                                        &lt;div class='controls'&gt;
                                          &lt;label class=''&gt;Label Text&lt;/label&gt; &lt;input class='form-control' type='text' name='label' id='label'&gt;
                                          &lt;label class=''&gt;Placeholder&lt;/label&gt; &lt;input type='text' name='placeholder' class='form-control' id='placeholder'&gt;
                                          &lt;label class=''&gt;Help Text&lt;/label&gt; &lt;input type='text' name='help' class='form-control' id='help'&gt;
                                          &lt;hr/&gt;
                                          &lt;button class='btn btn-info'&gt;Save&lt;/button&gt;&lt;button class='btn btn-danger'&gt;Cancel&lt;/button&gt;
                                        &lt;/div&gt;
                                  &lt;/form&gt;">

                                                                <!-- Search input-->
                                                                <label class="col-md-3 control-label valtype" data-valtype="label">Search input</label>
                                                                <div class="col-md-7 controls">
                                                                        <input type="text" placeholder="placeholder" class="form-control search-query valtype" data-valtype="placeholder">
                                                                        <p class="help-block valtype" data-valtype="help">Supporting help text</p>
                                                                </div>

                                                        </div>


                                                        <div class="form-group component" data-type="prep-text" rel="popover" title="Prepended Text Input" trigger="manual" data-content="
                                  &lt;form class='form'&gt;
                                        &lt;div class='controls'&gt;
                                          &lt;label class=''&gt;Label Text&lt;/label&gt; &lt;input class='form-control' type='text' name='label' id='label'&gt;
                                          &lt;label class=''&gt;Prepend&lt;/label&gt; &lt;input type='text' name='prepend' class='form-control' id='prepend'&gt;
                                          &lt;label class=''&gt;Placeholder&lt;/label&gt; &lt;input type='text' name='placeholder' class='form-control' id='placeholder'&gt;
                                          &lt;label class=''&gt;Help Text&lt;/label&gt; &lt;input type='text' name='help' class='form-control' id='help'&gt;
                                          &lt;hr/&gt;
                                          &lt;button class='btn btn-info'&gt;Save&lt;/button&gt;&lt;button class='btn btn-danger'&gt;Cancel&lt;/button&gt;
                                        &lt;/div&gt;
                                  &lt;/form&gt;">

                                                                <!-- Prepended text-->
                                                                <label class="col-md-3 control-label valtype" data-valtype="label">Prepended text</label>
                                                                <div class="col-md-7 controls">
                                                                        <div class="input-group">
                                                                                <span class="input-group-addon valtype" data-valtype="prepend">^_^</span>
                                                                                <input class="form-control valtype" placeholder="placeholder" id="prependedInput" type="text" data-valtype="placeholder">
                                                                        </div>
                                                                        <p class="help-block valtype" data-valtype="help">Supporting help text</p>
                                                                </div>

                                                        </div>

                                                        <div class="form-group component" data-type="app-text" rel="popover" title="Appended Text Input" trigger="manual" data-content="
                                  &lt;form class='form'&gt;
                                        &lt;div class='controls'&gt;
                                          &lt;label class=''&gt;Label Text&lt;/label&gt; &lt;input class='form-control' type='text' name='label' id='label'&gt;
                                          &lt;label class=''&gt;Appepend&lt;/label&gt; &lt;input type='text'  class='form-control' id='append'&gt;
                                          &lt;label class=''&gt;Placeholder&lt;/label&gt; &lt;input type='text' name='placeholder' class='form-control' id='placeholder'&gt;
                                          &lt;label class=''&gt;Help Text&lt;/label&gt; &lt;input type='text' name='help' class='form-control' id='help'&gt;
                                          &lt;hr/&gt;
                                          &lt;button class='btn btn-info'&gt;Save&lt;/button&gt;&lt;button class='btn btn-danger'&gt;Cancel&lt;/button&gt;
                                        &lt;/div&gt;
                                  &lt;/form&gt;">

                                                                <!-- Appended input-->
                                                                <label class="col-md-3 control-label valtype" data-valtype="label">Appended text</label>
                                                                <div class="col-md-7 controls">
                                                                        <div class="input-group">
                                                                                <input class="form-control valtype" data-valtype="placeholder" placeholder="placeholder" type="text">
                                                                                <span class="input-group-addon valtype" data-valtype="append">^_^</span>
                                                                        </div>
                                                                        <p class="help-block valtype" data-valtype="help">Supporting help text</p>
                                                                </div>

                                                        </div>
<!--
                                                        <div class="form-group component" rel="popover" title="Search Input" trigger="manual" data-content="
                                  &lt;form class='form'&gt;
                                        &lt;div class='controls'&gt;
                                          &lt;label class=''&gt;Label Text&lt;/label&gt; &lt;input class='form-control' type='text' name='label' id='label'&gt;
                                          &lt;label class=''&gt;Placeholder&lt;/label&gt; &lt;input type='text' name='placeholder' class='form-control' id='placeholder'&gt;
                                          &lt;label class=''&gt;Help Text&lt;/label&gt; &lt;input type='text' name='help' class='form-control' id='help'&gt;
                                          &lt;label class='checkbox'&gt;&lt;input type='checkbox' class='input-inline' name='checked' id='checkbox'&gt;Checked&lt;/label&gt;
                                          &lt;hr/&gt;
                                          &lt;button class='btn btn-info'&gt;Save&lt;/button&gt;&lt;button class='btn btn-danger'&gt;Cancel&lt;/button&gt;
                                        &lt;/div&gt;
                                  &lt;/form&gt;">

                                                                <label class="col-md-3 control-label valtype" data-valtype="label">Prepended checkbox</label>
                                                                <div class="col-md-7 controls">
                                                                        <div class="input-group">
                                                                                <span class="input-group-addon">
                                                                                        <input type="checkbox" class="checkbox valtype" data-valtype="checkbox">
                                                                                </span>
                                                                                <input class="form-control valtype" placeholder="placeholder" type="text" data-valtype="placeholder">
                                                                        </div>
                                                                        <p class="help-block valtype" data-valtype="help">Supporting help text</p>
                                                                </div>

                                                        </div>
-->
<!--
                                                        <div class="form-group component" rel="popover" title="Search Input" trigger="manual" data-content="
                                  &lt;form class='form'&gt;
                                        &lt;div class='controls'&gt;
                                          &lt;label class=''&gt;Label Text&lt;/label&gt; &lt;input class='form-control' type='text' name='label' id='label'&gt;
                                          &lt;label class=''&gt;Placeholder&lt;/label&gt; &lt;input type='text' name='placeholder' class='form-control' id='placeholder'&gt;
                                          &lt;label class=''&gt;Help Text&lt;/label&gt; &lt;input type='text' name='help' class='form-control' id='help'&gt;
                                          &lt;label class='checkbox'&gt;&lt;input type='checkbox' class='input-inline' name='checked' id='checkbox'&gt;Checked&lt;/label&gt;
                                          &lt;hr/&gt;
                                          &lt;button class='btn btn-info'&gt;Save&lt;/button&gt;&lt;button class='btn btn-danger'&gt;Cancel&lt;/button&gt;
                                        &lt;/div&gt;
                                  &lt;/form&gt;">

                                                                <label class="col-md-3 control-label valtype" data-valtype="label">Append checkbox</label>
                                                                <div class="col-md-7 controls">
                                                                        <div class="input-group">
                                                                                <input class="form-control valtype" placeholder="placeholder" type="text" data-valtype="placeholder">
                                                                                <span class="input-group-addon">
                                                                                        <input type="checkbox" class="checkbox valtype" data-valtype="checkbox">
                                                                                </span>
                                                                        </div>
                                                                        <p class="help-block valtype" data-valtype="help">Supporting help text</p>
                                                                </div>
                                                        </div>
-->
                                                        <div class="form-group component" rel="popover" title="Search Input" trigger="manual" data-content="
                                  &lt;form class='form'&gt;
                                        &lt;div class='controls'&gt;
                                          &lt;label class=''&gt;Label Text&lt;/label&gt; &lt;input class='form-control' type='text' name='label' id='label'&gt;
                                          &lt;hr/&gt;
                                          &lt;button class='btn btn-info'&gt;Save&lt;/button&gt;&lt;button class='btn btn-danger'&gt;Cancel&lt;/button&gt;
                                        &lt;/div&gt;
                                  &lt;/form&gt;">

                                                                <!-- Textarea -->
                                                                <label class="col-md-3 control-label valtype" data-valtype="label">Textarea</label>
                                                                <div class="col-md-7 controls">
                                                                        <div class="textarea">
                                                                                <textarea type="" class="valtype" data-valtype="checkbox"></textarea>
                                                                        </div>
                                                                </div>
                                                        </div>

                                                </div>

                                                <div class="tab-pane" id="2">

                                                        <div class="form-group component" rel="popover" title="Search Input" trigger="manual" data-content="
                                  &lt;form class='form'&gt;
                                        &lt;div class='controls'&gt;
                                          &lt;label class=''&gt;Label Text&lt;/label&gt; &lt;input class='form-control' type='text' name='label' id='label'&gt;
                                          &lt;label class=''&gt;Options: &lt;/label&gt;
                                          &lt;textarea style='min-height: 200px' id='option'&gt; &lt;/textarea&gt;
                                          &lt;hr/&gt;
                                          &lt;button class='btn btn-info'&gt;Save&lt;/button&gt;&lt;button class='btn btn-danger'&gt;Cancel&lt;/button&gt;
                                        &lt;/div&gt;
                                  &lt;/form&gt;">

                                                                <!-- Select Basic -->
                                                                <label class="col-md-3 control-label valtype" data-valtype="label">Select - Basic</label>
                                                                <div class="col-md-7 controls">
                                                                        <select class="form-control valtype" data-valtype="option">
                                                                                <option>Enter</option>
                                                                                <option>Your</option>
                                                                                <option>Options</option>
                                                                                <option>Here!</option>
                                                                        </select>
                                                                </div>

                                                        </div>

                                                        <div class="form-group component" rel="popover" title="Search Input" trigger="manual" data-content="
                                  &lt;form class='form'&gt;
                                        &lt;div class='controls'&gt;
                                          &lt;label class=''&gt;Label Text&lt;/label&gt; &lt;input class='form-control' type='text' name='label' id='label'&gt;
                                          &lt;label class=''&gt;Options: &lt;/label&gt;
                                          &lt;textarea style='min-height: 200px' id='option'&gt;&lt;/textarea&gt;
                                          &lt;hr/&gt;
                                          &lt;button class='btn btn-info'&gt;Save&lt;/button&gt;&lt;button class='btn btn-danger'&gt;Cancel&lt;/button&gt;
                                        &lt;/div&gt;
                                  &lt;/form&gt;">

                                                                <!-- Select Multiple -->
                                                                <label class="col-md-3 control-label valtype" data-valtype="label">Select - Multiple</label>
                                                                <div class="col-md-7 controls">
                                                                        <select class="form-control valtype" multiple="multiple" data-valtype="option">
                                                                                <option>Enter</option>
                                                                                <option>Your</option>
                                                                                <option>Options</option>
                                                                                <option>Here!</option>
                                                                        </select>
                                                                </div>
                                                        </div>

                                                </div>

                                                <div class="tab-pane" id="3">
                                                        <div class="form-group component" rel="popover" title="Multiple Checkboxes" trigger="manual" data-content="
                                  &lt;form class='form'&gt;
                                        &lt;div class='controls'&gt;
                                          &lt;label class=''&gt;Label Text&lt;/label&gt; &lt;input class='form-control' type='text' name='label' id='label'&gt;
                                          &lt;label class=''&gt;Options: &lt;/label&gt;
                                          &lt;textarea style='min-height: 200px' id='checkboxes'&gt; &lt;/textarea&gt;
                                          &lt;hr/&gt;
                                          &lt;button class='btn btn-info'&gt;Save&lt;/button&gt;&lt;button class='btn btn-danger'&gt;Cancel&lt;/button&gt;
                                        &lt;/div&gt;
                                  &lt;/form&gt;">
                                                                <label class="col-md-3 control-label valtype" data-valtype="label">Checkboxes</label>
                                                                <div class="controls valtype col-md-9" data-valtype="checkboxes">
                                                                        <!-- Multiple Checkboxes -->
                                                                        <label class="checkbox">
                                                                                <input type="checkbox" value="Option one">Option one
                                                                        </label>
                                                                        <label class="checkbox">
                                                                                <input type="checkbox" value="Option two">Option two
                                                                        </label>
                                                                </div>

                                                        </div>

                                                        <div class="form-group component" rel="popover" title="Multiple Radios" trigger="manual" data-content="
                                  &lt;form class='form'&gt;
                                        &lt;div class='controls'&gt;
                                          &lt;label class=''&gt;Label Text&lt;/label&gt; &lt;input class='form-control' type='text' name='label' id='label'&gt;
                                          &lt;label class=''&gt;Group Name Attribute&lt;/label&gt; &lt;input class='form-control' type='text' name='name' id='name'&gt;
                                          &lt;label class=''&gt;Options: &lt;/label&gt;
                                          &lt;textarea style='min-height: 200px' id='radios'&gt;&lt;/textarea&gt;
                                          &lt;hr/&gt;
                                          &lt;button class='btn btn-info'&gt;Save&lt;/button&gt;&lt;button class='btn btn-danger'&gt;Cancel&lt;/button&gt;
                                        &lt;/div&gt;
                                  &lt;/form&gt;">
                                                                <label class="col-md-3 control-label valtype" data-valtype="label">Radio buttons</label>
                                                                <div class="controls valtype col-md-9" data-valtype="radios">

                                                                        <!-- Multiple Radios -->
                                                                        <label class="radio">
                                                                                <input type="radio" value="Option one" name="group" checked="checked">Option one
                                                                        </label>
                                                                        <label class="radio">
                                                                                <input type="radio" value="Option two" name="group">Option two
                                                                        </label>
                                                                </div>

                                                        </div>
<!--
                                                        <div class="form-group component" rel="popover" title="Inline Checkboxes" trigger="manual" data-content="
                                  &lt;form class='form'&gt;
                                        &lt;div class='controls'&gt;
                                          &lt;label class=''&gt;Label Text&lt;/label&gt; &lt;input class='form-control' type='text' name='label' id='label'&gt;
                                          &lt;textarea style='min-height: 200px' id='inline-checkboxes'&gt;&lt;/textarea&gt;
                                          &lt;hr/&gt;
                                          &lt;button class='btn btn-info'&gt;Save&lt;/button&gt;&lt;button class='btn btn-danger'&gt;Cancel&lt;/button&gt;
                                        &lt;/div&gt;
                                  &lt;/form&gt;">
                                                                <label class="col-md-3 control-label valtype" data-valtype="label">Inline Checkboxes</label>

                                                                <div class="controls valtype col-md-9" data-valtype="inline-checkboxes">
                                                                        <label class="checkbox inline">
                                                                                <input type="checkbox" value="1">1
                                                                        </label>
                                                                        <label class="checkbox inline">
                                                                                <input type="checkbox" value="2">2
                                                                        </label>
                                                                        <label class="checkbox inline">
                                                                                <input type="checkbox" value="3">3
                                                                        </label>
                                                                </div>

                                                        </div>
-->
<!--								<div class="form-group component" rel="popover" title="Inline radioes" trigger="manual" data-content="
                                  &lt;form class='form'&gt;
                                        &lt;div class='controls'&gt;
                                          &lt;label class=''&gt;Label Text&lt;/label&gt; &lt;input class='form-control' type='text' name='label' id='label'&gt;
                                          &lt;label class=''&gt;Group Name Attribute&lt;/label&gt; &lt;input class='form-control' type='text' name='name' id='name'&gt;
                                          &lt;textarea style='min-height: 200px' id='inline-radios'&gt;&lt;/textarea&gt;
                                          &lt;hr/&gt;
                                          &lt;button class='btn btn-info'&gt;Save&lt;/button&gt;&lt;button class='btn btn-danger'&gt;Cancel&lt;/button&gt;
                                        &lt;/div&gt;
                                  &lt;/form&gt;">
                                                                <label class="col-md-3 control-label valtype" data-valtype="label">Inline radios</label>
                                                                <div class="controls valtype col-md-9" data-valtype="inline-radios">

                                                                        <label class="radio inline">
                                                                                <input type="radio" value="1" checked="checked" name="group">1
                                                                        </label>
                                                                        <label class="radio inline">
                                                                                <input type="radio" value="2" name="group">2
                                                                        </label>
                                                                        <label class="radio inline">
                                                                                <input type="radio" value="3">3
                                                                        </label>
                                                                </div>
                                                        </div>
-->
                                                </div>

                                                <div class="tab-pane" id="4">
                                                        <div class="form-group component" rel="popover" title="File Upload" trigger="manual" data-content="
                                  &lt;form class='form'&gt;
                                        &lt;div class='controls'&gt;
                                          &lt;label class=''&gt;Label Text&lt;/label&gt; &lt;input class='form-control' type='text' name='label' id='label'&gt;
                                          &lt;hr/&gt;
                                          &lt;button class='btn btn-info'&gt;Save&lt;/button&gt;&lt;button class='btn btn-danger'&gt;Cancel&lt;/button&gt;
                                        &lt;/div&gt;
                                  &lt;/form&gt;">
                                                                <label class="col-md-3 control-label valtype" data-valtype="label">File Button</label>

                                                                <!-- File Upload -->
                                                                <div class="col-md-7 controls">
                                                                        <input class="input-file" id="fileInput" type="file">
                                                                </div>
                                                        </div>

                                                        <div class="form-group component" rel="popover" title="Search Input" trigger="manual" data-content="
                                  &lt;form class='form'&gt;
                                        &lt;div class='controls'&gt;
                                          &lt;label class=''&gt;Label Text&lt;/label&gt; &lt;input class='form-control' type='text' name='label' id='label'&gt;
                                          &lt;label class=''&gt;Button Text&lt;/label&gt; &lt;input class='form-control' type='text' name='label' id='button'&gt;
                                          &lt;label class='' id=''&gt;Type: &lt;/label&gt;
                                          &lt;select class='input' id='color'&gt;
                                                &lt;option id='btn-default'&gt;Default&lt;/option&gt;
                                                &lt;option id='btn-primary'&gt;Primary&lt;/option&gt;
                                                &lt;option id='btn-info'&gt;Info&lt;/option&gt;
                                                &lt;option id='btn-success'&gt;Success&lt;/option&gt;
                                                &lt;option id='btn-warning'&gt;Warning&lt;/option&gt;
                                                &lt;option id='btn-danger'&gt;Danger&lt;/option&gt;
                                                &lt;option id='btn-inverse'&gt;Inverse&lt;/option&gt;
                                          &lt;/select&gt;
                                          &lt;hr/&gt;
                                          &lt;button class='btn btn-info'&gt;Save&lt;/button&gt;&lt;button class='btn btn-danger'&gt;Cancel&lt;/button&gt;
                                        &lt;/div&gt;
                                  &lt;/form&gt;">
                                                                <label class="col-md-3 control-label valtype" data-valtype="label">Button</label>

                                                                <!-- Button -->
                                                                <div class="controls valtype" data-valtype="button">
                                                                        <button class="btn btn-success">Button</button>
                                                                </div>
                                                        </div>
                                                </div>


                                                <div class="tab-pane" id="5">
                                                        <textarea id="source" class="span6"></textarea>
                                                </div>
                                        </div>
                                </fieldset>
                        </form>
                </div>
        </div>

</div>
<input type="hidden" id="classify_id" name="classify_id" value="<?=$classify_id?>">