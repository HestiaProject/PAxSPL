@extends('projects.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Feature Model: {{ $feature_model->name }}</h2>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="card shadow mb-4">
            <a class="d-block card-header py-3 collapsed" href="#collapseTrace" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseTrace">

                <h6 class="m-0 font-weight-bold text-primary">Traceability Matrix:</h6>
            </a>

            <!-- Card Content - Collapse -->
            <div class="collapse" id="collapseTrace" style="">
                <div class="card-body">


                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100" style="width:100%">
                            <tr>
                                <th><strong> Feature/Artifact</strong></th>
                                @foreach ($project->artifacts as $artifact)
                                <th>{{ $artifact->name }}</th>
                                @endforeach

                            </tr>
                            @foreach ($feature_model->features_order() as $feature)
                            <tr>

                                <td>{{ $feature->name }}</td>
                                @foreach ($project->artifacts as $artifact)

                                <td style=" text-align: center; vertical-align: middle;">{!! $feature->check_artifact($artifact) !!}</td>

                                @endforeach
                            </tr>
                            @endforeach
                        </table>


                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <a class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">

                <h6 class="m-0 font-weight-bold text-primary">Configuration:</h6>
            </a>

            <!-- Card Content - Collapse -->
            <div class="" id="collapseCanvas" style="">
                <div class="card-body">

                    <button onclick="config()" class="btn btn-secondary">Reset Configurator <i class="fas fa-undo"></i></button>
                    <div class="configurator"></div>
                    <pre></pre>
                </div>
            </div>
        </div>

    </div>
</div>



<script>
    $(document).ready(function() {



        config();
    });

    function config() {
        try {
            var xml = $.parseXML(<?php echo '\'' . $feature_model->generate_xml() . '\'' ?>);





            window.app = new Configurator(new Model(new XmlModel(xml)), {
                target: $(".configurator"),

                renderer: {
                    renderAround: function(fn) {
                        var html = "<p>This configuration is " + (this.configuration.isValid() ? "valid" : "invalid") +
                            " and " + (this.configuration.isComplete() ? "complete" : "incomplete") + ".</p>";
                        html += fn();
                        html += '<button class="export btn btn-success" ' + (this.configuration.isComplete() ? "" : "disabled") + '>Download Configuration <i class="fas fa-file-code"></i></button>';
                        return html;
                    },
                    renderLabel: function(label, feature) { // use this to adjust feature labeling
                        return label.text(feature.name).attr("title", feature.description);
                    },

                    afterRender: function() {
                        var self = this;
                        $(".export").click(function() {

                            // $("pre").empty().text(self.configuration.serialize());
                            var xmltext = self.configuration.serialize();
                            var pom = document.createElement('a');

                            var filename = "configuration.xml";
                            var pom = document.createElement('a');
                            var bb = new Blob([xmltext], {
                                type: 'text/plain'
                            });

                            pom.setAttribute('href', window.URL.createObjectURL(bb));
                            pom.setAttribute('download', filename);

                            pom.dataset.downloadurl = ['text/plain', pom.download, pom.href].join(':');
                            pom.draggable = true;
                            pom.classList.add('dragout');
                            pom.click();
                        });

                    }
                }
            });
        } catch (e) {
            alert(e);
        }
    };
</script>
@endsection