@extends('projects.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>New Product</h2>
        </div>

    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('projects.feature_model.product.store' , ['project'=>$project->id,'feature_model'=>$feature_model->id]) }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Product Name" required maxlength="100">
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" id="description" style="height:150px" name="description" placeholder="Description" required maxlength="500"></textarea>
            </div>
        </div>

    </div>
    <div class="row">
        <!-- Card Content - Collapse -->
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="card shadow mb-4">


                <!-- Card Content - Collapse -->
                <div class="" id="collapseCanvas" style="">
                    <div class="card-body">

                        <div class="configurator"></div>
                        <pre></pre>
                    </div>
                </div>
            </div>

        </div>
        <!-- <button type="submit" class="btn btn-primary">Save <i class="fas fa-save"></i></button> -->

    </div>
    <input type="hidden" id="project_id" name="project_id" value=" {{ $project->id }}">
    <input type="hidden" id="feature_model" name="feature_model" value=" {{ $feature_model->id }}">
    <input type="hidden" id="features" name="features" value="">

</form>
<script>
    $(function() {

        try {
            var xml = $.parseXML(<?php echo '\'' . $feature_model->generate_xml() . '\'' ?>);
            window.app = new Configurator(new Model(new XmlModel(xml)), {
                target: $(".configurator"),

                renderer: {
                    renderAround: function(fn) {
                        var html = "<p>This configuration is " + (this.configuration.isValid() ? "valid" : "invalid") +
                            " and " + (this.configuration.isComplete() ? "complete" : "incomplete") + ".</p>";
                        html += fn();
                        html += '<button type="submit" class="export btn btn-success" ' + (this.configuration.isComplete() ? "" : "disabled") + '>Save Product <i class="fas fa-save"></i></button>';
                        return html;
                    },
                    renderLabel: function(label, feature) { // use this to adjust feature labeling
                        return label.text(feature.name).attr("title", feature.description);
                    },

                    afterRender: function() {
                        var self = this;
                        $(".export").click(function() {
                            alert(self.configuration.serialize());
                            $('#features').val(self.configuration.serialize());

                            //         // $("pre").empty().text(self.configuration.serialize());
                            //         var xmltext = self.configuration.serialize();
                            //         var pom = document.createElement('a');

                            //         var filename = "configuration.xml";
                            //         var pom = document.createElement('a');
                            //         var bb = new Blob([xmltext], {
                            //             type: 'text/plain'
                            //         });

                            //         pom.setAttribute('href', window.URL.createObjectURL(bb));
                            //         pom.setAttribute('download', filename);

                            //         pom.dataset.downloadurl = ['text/plain', pom.download, pom.href].join(':');
                            //         pom.draggable = true;
                            //         pom.classList.add('dragout');
                            //         pom.click();
                        });

                    }
                }
            });
        } catch (e) {
            alert(e);
        }
    });
</script>
@endsection