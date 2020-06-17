@extends('projects.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Assembled Process: {{ $assemble_process->name }}</h2>
        </div>

    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Assembled Process</h6>
    </div>
    <div class="card-body">
        <div id="canvas"></div>
    </div>

</div>
<form action="{{ route('projects.assemble_process.update', ['project'=>$project->id,'assemble_process'=>$assemble_process->id,'bpmn'=>'1', ]) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" id="diagram" name="diagram">
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" id="save-button" class="btn btn-primary">Update Diagram <i class="fas fa-save"></i></button>

        <a class="btn btn-secondary" id="svg-button" href="">Download SVG <i class="fas fa-image"></i></a>


    </div>
</form>

<script src="https://unpkg.com/bpmn-js@6.5.1/dist/bpmn-modeler.development.js"></script>
<script>
    var diagramUrl = <?php
                        $string = preg_replace('/\\s\\s+/', ' ', ($assemble_process->diagram));
                        echo $string ?>;

    // modeler instance
    var bpmnModeler = new BpmnJS({
        container: '#canvas',
        keyboard: {
            bindTo: window
        }
    });

    function save_svg() {
        bpmnModeler.saveSVG({
            format: true
        }, function(error, svg) {
            if (error) {
                return;
            }

            var svgBlob = new Blob([svg], {
                type: 'image/svg+xml'
            });

            var fileName = 'retrieval_process.svg';

            var downloadLink = document.createElement('a');
            downloadLink.download = fileName;
            downloadLink.innerHTML = 'Get BPMN SVG';
            downloadLink.href = window.URL.createObjectURL(svgBlob);
            downloadLink.onclick = function(event) {
                document.body.removeChild(event.target);
            };
            downloadLink.style.visibility = 'hidden';
            document.body.appendChild(downloadLink);
            downloadLink.click();
        });
    }

    /**
     * Save diagram contents and print them to the console.
     */
    function exportDiagram() {

        bpmnModeler.saveXML({
            format: true
        }, function(err, xml) {

            if (err) {
                return console.error('could not save BPMN 2.0 diagram', err);
            }




            $(diagram).val("'" + xml + "'");
            console.log('DIAGRAM', $(diagram).val());
        });
    }

    /**
     * Open diagram in our modeler instance.
     *
     * @param {String} bpmnXML diagram to display
     */
    function openDiagram(bpmnXML) {

        // import diagram
        bpmnModeler.importXML(bpmnXML, function(err) {

            if (err) {
                return console.error('could not import BPMN 2.0 diagram', err);
            }

            // access modeler components
            var canvas = bpmnModeler.get('canvas');
            var overlays = bpmnModeler.get('overlays');


            // zoom to fit full viewport
            canvas.zoom('fit-viewport');


        });
    }


    // load external diagram file via AJAX and open it
    openDiagram(diagramUrl);

    // wire save button
    $('#save-button').click(exportDiagram);
    $('#svg-button').click(save_svg);
</script>
@endsection