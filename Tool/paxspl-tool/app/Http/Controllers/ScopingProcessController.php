<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssembleProcess;
use App\Project;

class ScopingProcessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        return  view('projects.scoping_process.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        return view('projects.scoping_process.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $assemble_process = new AssembleProcess();
        $assemble_process->name = $request->name;
        $assemble_process->type = 's';
        $assemble_process->project_id = $request->project_id;
        $assemble_process->diagram = '\' <?xml version="1.0" encoding="UTF-8"?> <bpmn:definitions xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:bpmn="http://www.omg.org/spec/BPMN/20100524/MODEL" xmlns:bpmndi="http://www.omg.org/spec/BPMN/20100524/DI" xmlns:dc="http://www.omg.org/spec/DD/20100524/DC" xmlns:di="http://www.omg.org/spec/DD/20100524/DI" id="Definitions_014zzan" targetNamespace="http://bpmn.io/schema/bpmn" exporter="bpmn-js (https://demo.bpmn.io)" exporterVersion="6.5.1">   <bpmn:collaboration id="Collaboration_0msf5rh">     <bpmn:participant id="Participant_1dpdn6p" name="Generic Scoping Process" processRef="Process_0nqp456" />   </bpmn:collaboration>   <bpmn:process id="Process_0nqp456" isExecutable="false">     <bpmn:startEvent id="Event_00ivwir">       <bpmn:outgoing>Flow_0ufuik6</bpmn:outgoing>     </bpmn:startEvent>     <bpmn:task id="Activity_0b44uyr" name="Pre-Scoping">       <bpmn:incoming>Flow_0ufuik6</bpmn:incoming>       <bpmn:outgoing>Flow_0jlqzbv</bpmn:outgoing>     </bpmn:task>     <bpmn:inclusiveGateway id="Gateway_0a2g599">       <bpmn:incoming>Flow_0jlqzbv</bpmn:incoming>       <bpmn:outgoing>Flow_1yadp7s</bpmn:outgoing>       <bpmn:outgoing>Flow_0m75xu5</bpmn:outgoing>       <bpmn:outgoing>Flow_0ykmxxp</bpmn:outgoing>     </bpmn:inclusiveGateway>     <bpmn:inclusiveGateway id="Gateway_190p5r1">       <bpmn:incoming>Flow_14xplzk</bpmn:incoming>       <bpmn:incoming>Flow_046vew3</bpmn:incoming>       <bpmn:incoming>Flow_06bnwyz</bpmn:incoming>       <bpmn:outgoing>Flow_1jbyuhf</bpmn:outgoing>     </bpmn:inclusiveGateway>     <bpmn:task id="Activity_0k6qsjk" name="Scoping Closure">       <bpmn:incoming>Flow_1jbyuhf</bpmn:incoming>       <bpmn:outgoing>Flow_1vot7x3</bpmn:outgoing>     </bpmn:task>     <bpmn:task id="Activity_0jajyfo" name="Domain Scoping">       <bpmn:incoming>Flow_0m75xu5</bpmn:incoming>       <bpmn:outgoing>Flow_06bnwyz</bpmn:outgoing>     </bpmn:task>     <bpmn:task id="Activity_12pbov6" name="Product Scoping">       <bpmn:incoming>Flow_1yadp7s</bpmn:incoming>       <bpmn:outgoing>Flow_14xplzk</bpmn:outgoing>     </bpmn:task>     <bpmn:task id="Activity_0u9knnc" name="Asset Scoping">       <bpmn:incoming>Flow_0ykmxxp</bpmn:incoming>       <bpmn:outgoing>Flow_046vew3</bpmn:outgoing>     </bpmn:task>     <bpmn:endEvent id="Event_0wmrvj1">       <bpmn:incoming>Flow_1vot7x3</bpmn:incoming>     </bpmn:endEvent>     <bpmn:sequenceFlow id="Flow_1yadp7s" sourceRef="Gateway_0a2g599" targetRef="Activity_12pbov6" />     <bpmn:sequenceFlow id="Flow_14xplzk" sourceRef="Activity_12pbov6" targetRef="Gateway_190p5r1" />     <bpmn:sequenceFlow id="Flow_0jlqzbv" sourceRef="Activity_0b44uyr" targetRef="Gateway_0a2g599" />     <bpmn:sequenceFlow id="Flow_0ufuik6" sourceRef="Event_00ivwir" targetRef="Activity_0b44uyr" />     <bpmn:sequenceFlow id="Flow_1jbyuhf" sourceRef="Gateway_190p5r1" targetRef="Activity_0k6qsjk" />     <bpmn:sequenceFlow id="Flow_1vot7x3" sourceRef="Activity_0k6qsjk" targetRef="Event_0wmrvj1" />     <bpmn:sequenceFlow id="Flow_0m75xu5" sourceRef="Gateway_0a2g599" targetRef="Activity_0jajyfo" />     <bpmn:sequenceFlow id="Flow_0ykmxxp" sourceRef="Gateway_0a2g599" targetRef="Activity_0u9knnc" />     <bpmn:sequenceFlow id="Flow_046vew3" sourceRef="Activity_0u9knnc" targetRef="Gateway_190p5r1" />     <bpmn:sequenceFlow id="Flow_06bnwyz" sourceRef="Activity_0jajyfo" targetRef="Gateway_190p5r1" />   </bpmn:process>   <bpmndi:BPMNDiagram id="BPMNDiagram_1">     <bpmndi:BPMNPlane id="BPMNPlane_1" bpmnElement="Collaboration_0msf5rh">       <bpmndi:BPMNShape id="Participant_1dpdn6p_di" bpmnElement="Participant_1dpdn6p" isHorizontal="true">         <dc:Bounds x="180" y="-10" width="820" height="300" />       </bpmndi:BPMNShape>       <bpmndi:BPMNEdge id="Flow_1yadp7s_di" bpmnElement="Flow_1yadp7s">         <di:waypoint x="515" y="140" />         <di:waypoint x="560" y="140" />         <bpmndi:BPMNLabel>           <dc:Bounds x="575" y="132" width="15" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_14xplzk_di" bpmnElement="Flow_14xplzk">         <di:waypoint x="660" y="140" />         <di:waypoint x="715" y="140" />       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_0jlqzbv_di" bpmnElement="Flow_0jlqzbv">         <di:waypoint x="430" y="140" />         <di:waypoint x="465" y="140" />       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_0ufuik6_di" bpmnElement="Flow_0ufuik6">         <di:waypoint x="268" y="140" />         <di:waypoint x="330" y="140" />       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_1jbyuhf_di" bpmnElement="Flow_1jbyuhf">         <di:waypoint x="765" y="140" />         <di:waypoint x="810" y="140" />       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_1vot7x3_di" bpmnElement="Flow_1vot7x3">         <di:waypoint x="910" y="140" />         <di:waypoint x="942" y="140" />       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_0m75xu5_di" bpmnElement="Flow_0m75xu5">         <di:waypoint x="490" y="115" />         <di:waypoint x="490" y="50" />         <di:waypoint x="560" y="50" />       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_0ykmxxp_di" bpmnElement="Flow_0ykmxxp">         <di:waypoint x="490" y="165" />         <di:waypoint x="490" y="230" />         <di:waypoint x="560" y="230" />       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_046vew3_di" bpmnElement="Flow_046vew3">         <di:waypoint x="660" y="230" />         <di:waypoint x="740" y="230" />         <di:waypoint x="740" y="165" />       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_06bnwyz_di" bpmnElement="Flow_06bnwyz">         <di:waypoint x="660" y="50" />         <di:waypoint x="740" y="50" />         <di:waypoint x="740" y="115" />       </bpmndi:BPMNEdge>       <bpmndi:BPMNShape id="Event_00ivwir_di" bpmnElement="Event_00ivwir">         <dc:Bounds x="232" y="122" width="36" height="36" />       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Activity_0b44uyr_di" bpmnElement="Activity_0b44uyr">         <dc:Bounds x="330" y="100" width="100" height="80" />       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Gateway_1kut6rf_di" bpmnElement="Gateway_0a2g599">         <dc:Bounds x="465" y="115" width="50" height="50" />         <bpmndi:BPMNLabel>           <dc:Bounds x="474" y="182" width="32" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Gateway_15h81z8_di" bpmnElement="Gateway_190p5r1">         <dc:Bounds x="715" y="115" width="50" height="50" />         <bpmndi:BPMNLabel>           <dc:Bounds x="754" y="163" width="32" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Activity_0k6qsjk_di" bpmnElement="Activity_0k6qsjk">         <dc:Bounds x="810" y="100" width="100" height="80" />       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Activity_0jajyfo_di" bpmnElement="Activity_0jajyfo">         <dc:Bounds x="560" y="10" width="100" height="80" />       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Activity_12pbov6_di" bpmnElement="Activity_12pbov6">         <dc:Bounds x="560" y="100" width="100" height="80" />       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Activity_0u9knnc_di" bpmnElement="Activity_0u9knnc">         <dc:Bounds x="560" y="190" width="100" height="80" />       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Event_0wmrvj1_di" bpmnElement="Event_0wmrvj1">         <dc:Bounds x="942" y="122" width="36" height="36" />   
            </bpmndi:BPMNShape>     </bpmndi:BPMNPlane>   </bpmndi:BPMNDiagram> </bpmn:definitions>\'';
        $assemble_process->save();

        $project = Project::find($request->project_id);

        return redirect()->route('projects.scoping_process.index', compact('project'))
            ->with('success', 'Process created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $scoping_process = AssembleProcess::where('id', $request->scoping_process)->first();
        $project = Project::where('id', $request->project)->first();
        $route = $request->bpmn;
        if ($route == 't') {
            return view('projects.scoping_process.show', compact('scoping_process', 'project'));
        } else
            return view('projects.scoping_process.activities.index', compact('scoping_process', 'project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $scoping_process = AssembleProcess::where('id', $request->scoping_process)->first();
        $project = Project::where('id', $request->project)->first();
        return view('projects.scoping_process.edit', compact('scoping_process', 'project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $assemble_process =  AssembleProcess::find($request->scoping_process);

        if ($request->bpmn == '1') {
            $assemble_process->diagram = $request->diagram;
        } else {
            $request->validate([
                'name' => 'required',
            ]);
        }
        $assemble_process->update($request->all());


        $project = $request->project;

        return redirect()->route('projects.scoping_process.index', compact('project'))
            ->with('success', 'Process information updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, AssembleProcess $scoping_process)
    {
        $scoping_process->delete();

        return redirect()->route('projects.scoping_process.index', compact('project'))
            ->with('success', 'Process deleted successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function finish(Project $project, AssembleProcess $assemble_process)
    {
        $assemble_process->status = 'assembled';


        $assemble_process->update();
    }
}
