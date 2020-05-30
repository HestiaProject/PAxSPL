<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssembleProcess;
use App\Project;
use Illuminate\Support\Facades\Route;

class AssembleProcessController extends Controller
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
        return  view('projects.assemble_process.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        return view('projects.assemble_process.create', compact('project'));
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
        $diagram = '\'<?xml version="1.0" encoding="UTF-8"?> <bpmn:definitions xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:bpmn="http://www.omg.org/spec/BPMN/20100524/MODEL" xmlns:bpmndi="http://www.omg.org/spec/BPMN/20100524/DI" xmlns:dc="http://www.omg.org/spec/DD/20100524/DC" xmlns:di="http://www.omg.org/spec/DD/20100524/DI" id="Definitions_014zzan" targetNamespace="http://bpmn.io/schema/bpmn" exporter="bpmn-js (https://demo.bpmn.io)" exporterVersion="6.5.1">   <bpmn:collaboration id="Collaboration_0msf5rh">     <bpmn:participant id="Participant_1dpdn6p" name="Generic Process" processRef="Process_0nqp456" />   </bpmn:collaboration>   <bpmn:process id="Process_0nqp456" isExecutable="false">     <bpmn:startEvent id="Event_00ivwir">       <bpmn:outgoing>Flow_0ufuik6</bpmn:outgoing>     </bpmn:startEvent>     <bpmn:task id="Activity_0b44uyr" name="Extract">       <bpmn:incoming>Flow_0ufuik6</bpmn:incoming>       <bpmn:incoming>Flow_1x1en9f</bpmn:incoming>       <bpmn:outgoing>Flow_0jlqzbv</bpmn:outgoing>     </bpmn:task>     <bpmn:sequenceFlow id="Flow_0ufuik6" sourceRef="Event_00ivwir" targetRef="Activity_0b44uyr" />     <bpmn:exclusiveGateway id="Gateway_0a2g599" name="Check">       <bpmn:incoming>Flow_0jlqzbv</bpmn:incoming>       <bpmn:outgoing>Flow_1x1en9f</bpmn:outgoing>       <bpmn:outgoing>Flow_1yadp7s</bpmn:outgoing>     </bpmn:exclusiveGateway>     <bpmn:sequenceFlow id="Flow_0jlqzbv" sourceRef="Activity_0b44uyr" targetRef="Gateway_0a2g599" />     <bpmn:sequenceFlow id="Flow_1x1en9f" name="Not Ok" sourceRef="Gateway_0a2g599" targetRef="Activity_0b44uyr" />     <bpmn:exclusiveGateway id="Gateway_190p5r1" name="Check">       <bpmn:incoming>Flow_14xplzk</bpmn:incoming>       <bpmn:outgoing>Flow_1r5ghn4</bpmn:outgoing>       <bpmn:outgoing>Flow_0bacyby</bpmn:outgoing>     </bpmn:exclusiveGateway>     <bpmn:sequenceFlow id="Flow_1r5ghn4" name="Not Ok" sourceRef="Gateway_190p5r1" targetRef="Activity_12pbov6" />     <bpmn:task id="Activity_12pbov6" name="Categorize">       <bpmn:incoming>Flow_1yadp7s</bpmn:incoming>       <bpmn:incoming>Flow_1r5ghn4</bpmn:incoming>       <bpmn:outgoing>Flow_14xplzk</bpmn:outgoing>     </bpmn:task>     <bpmn:sequenceFlow id="Flow_14xplzk" sourceRef="Activity_12pbov6" targetRef="Gateway_190p5r1" />     <bpmn:sequenceFlow id="Flow_1yadp7s" name="Ok" sourceRef="Gateway_0a2g599" targetRef="Activity_12pbov6" />     <bpmn:task id="Activity_18wcxg1" name="Group">       <bpmn:incoming>Flow_0bacyby</bpmn:incoming>       <bpmn:incoming>Flow_1qztjd5</bpmn:incoming>       <bpmn:outgoing>Flow_1v39yum</bpmn:outgoing>     </bpmn:task>     <bpmn:sequenceFlow id="Flow_0bacyby" name="Ok" sourceRef="Gateway_190p5r1" targetRef="Activity_18wcxg1" />     <bpmn:exclusiveGateway id="Gateway_1ssqwu7" name="Check">       <bpmn:incoming>Flow_1v39yum</bpmn:incoming>       <bpmn:outgoing>Flow_1qztjd5</bpmn:outgoing>       <bpmn:outgoing>Flow_056edb0</bpmn:outgoing>     </bpmn:exclusiveGateway>     <bpmn:sequenceFlow id="Flow_1v39yum" sourceRef="Activity_18wcxg1" targetRef="Gateway_1ssqwu7" />     <bpmn:sequenceFlow id="Flow_1qztjd5" name="Not Ok" sourceRef="Gateway_1ssqwu7" targetRef="Activity_18wcxg1" />     <bpmn:task id="Activity_1avb052" name="Create Feature Model">       <bpmn:incoming>Flow_056edb0</bpmn:incoming>       <bpmn:incoming>Flow_0lst3zv</bpmn:incoming>       <bpmn:outgoing>Flow_0mz8g4i</bpmn:outgoing>     </bpmn:task>     <bpmn:sequenceFlow id="Flow_056edb0" name="Ok" sourceRef="Gateway_1ssqwu7" targetRef="Activity_1avb052" />     <bpmn:exclusiveGateway id="Gateway_0balowq" name="Check">       <bpmn:incoming>Flow_0mz8g4i</bpmn:incoming>       <bpmn:outgoing>Flow_0qplcfp</bpmn:outgoing>       <bpmn:outgoing>Flow_0lst3zv</bpmn:outgoing>     </bpmn:exclusiveGateway>     <bpmn:sequenceFlow id="Flow_0mz8g4i" sourceRef="Activity_1avb052" targetRef="Gateway_0balowq" />     <bpmn:endEvent id="Event_0wmrvj1">       <bpmn:incoming>Flow_0qplcfp</bpmn:incoming>     </bpmn:endEvent>     <bpmn:sequenceFlow id="Flow_0qplcfp" name="Ok" sourceRef="Gateway_0balowq" targetRef="Event_0wmrvj1" />     <bpmn:sequenceFlow id="Flow_0lst3zv" name="Not Ok" sourceRef="Gateway_0balowq" targetRef="Activity_1avb052" />   </bpmn:process>   <bpmndi:BPMNDiagram id="BPMNDiagram_1">     <bpmndi:BPMNPlane id="BPMNPlane_1" bpmnElement="Collaboration_0msf5rh">       <bpmndi:BPMNShape id="Participant_1dpdn6p_di" bpmnElement="Participant_1dpdn6p" isHorizontal="true">         <dc:Bounds x="190" y="40" width="710" height="310" />       </bpmndi:BPMNShape>       <bpmndi:BPMNEdge id="Flow_0ufuik6_di" bpmnElement="Flow_0ufuik6">         <di:waypoint x="278" y="150" />         <di:waypoint x="340" y="150" />       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_0jlqzbv_di" bpmnElement="Flow_0jlqzbv">         <di:waypoint x="440" y="150" />         <di:waypoint x="515" y="150" />       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_1x1en9f_di" bpmnElement="Flow_1x1en9f">         <di:waypoint x="540" y="125" />         <di:waypoint x="540" y="50" />         <di:waypoint x="390" y="50" />         <di:waypoint x="390" y="110" />         <bpmndi:BPMNLabel>           <dc:Bounds x="448" y="53" width="35" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_1yadp7s_di" bpmnElement="Flow_1yadp7s">         <di:waypoint x="565" y="150" />         <di:waypoint x="640" y="150" />         <bpmndi:BPMNLabel>           <dc:Bounds x="595" y="132" width="15" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_14xplzk_di" bpmnElement="Flow_14xplzk">         <di:waypoint x="740" y="150" />         <di:waypoint x="805" y="150" />       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_1r5ghn4_di" bpmnElement="Flow_1r5ghn4">         <di:waypoint x="830" y="125" />         <di:waypoint x="830" y="50" />         <di:waypoint x="690" y="50" />         <di:waypoint x="690" y="110" />         <bpmndi:BPMNLabel>           <dc:Bounds x="743" y="53" width="35" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_0bacyby_di" bpmnElement="Flow_0bacyby">         <di:waypoint x="830" y="175" />         <di:waypoint x="830" y="240" />         <bpmndi:BPMNLabel>           <dc:Bounds x="838" y="205" width="15" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_1v39yum_di" bpmnElement="Flow_1v39yum">         <di:waypoint x="780" y="280" />         <di:waypoint x="715" y="280" />       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_1qztjd5_di" bpmnElement="Flow_1qztjd5">         <di:waypoint x="690" y="255" />         <di:waypoint x="690" y="200" />         <di:waypoint x="790" y="200" />         <di:waypoint x="790" y="240" />         <bpmndi:BPMNLabel>           <dc:Bounds x="723" y="203" width="35" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_056edb0_di" bpmnElement="Flow_056edb0">         <di:waypoint x="665" y="280" />         <di:waypoint x="570" y="280" />         <bpmndi:BPMNLabel>           <dc:Bounds x="610" y="262" width="15" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_0mz8g4i_di" bpmnElement="Flow_0mz8g4i">         <di:waypoint x="470" y="280" />         <di:waypoint x="395" y="280" />       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_0qplcfp_di" bpmnElement="Flow_0qplcfp">         <di:waypoint x="345" y="280" />         <di:waypoint x="278" y="280" />         <bpmndi:BPMNLabel>           <dc:Bounds x="304" y="262" width="15" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_0lst3zv_di" bpmnElement="Flow_0lst3zv">         <di:waypoint x="370" y="255" />         <di:waypoint x="370" y="200" />         <di:waypoint x="490" y="200" />         <di:waypoint x="490" y="240" />         <bpmndi:BPMNLabel>           <dc:Bounds x="413" y="203" width="35" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNShape id="Event_00ivwir_di" bpmnElement="Event_00ivwir">         <dc:Bounds x="242" y="132" width="36" height="36" />       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Activity_0b44uyr_di" bpmnElement="Activity_0b44uyr">         <dc:Bounds x="340" y="110" width="100" height="80" />       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Gateway_0a2g599_di" bpmnElement="Gateway_0a2g599" isMarkerVisible="true">         <dc:Bounds x="515" y="125" width="50" height="50" />         <bpmndi:BPMNLabel>           <dc:Bounds x="524" y="182" width="32" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Activity_12pbov6_di" bpmnElement="Activity_12pbov6">         <dc:Bounds x="640" y="110" width="100" height="80" />       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Gateway_190p5r1_di" bpmnElement="Gateway_190p5r1" isMarkerVisible="true">         <dc:Bounds x="805" y="125" width="50" height="50" />         <bpmndi:BPMNLabel>           <dc:Bounds x="844" y="163" width="32" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Activity_18wcxg1_di" bpmnElement="Activity_18wcxg1">         <dc:Bounds x="780" y="240" width="100" height="80" />       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Gateway_1ssqwu7_di" bpmnElement="Gateway_1ssqwu7" isMarkerVisible="true">         <dc:Bounds x="665" y="255" width="50" height="50" />         <bpmndi:BPMNLabel>           <dc:Bounds x="674" y="312" width="32" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Activity_1avb052_di" bpmnElement="Activity_1avb052">         <dc:Bounds x="470" y="240" width="100" height="80" />       </bpmndi:BPMNShape><bpmndi:BPMNShape id="Gateway_0balowq_di" bpmnElement="Gateway_0balowq" isMarkerVisible="true">    
                 <dc:Bounds x="345" y="255" width="50" height="50" />         <bpmndi:BPMNLabel>           <dc:Bounds x="354" y="312" width="32" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Event_0wmrvj1_di" bpmnElement="Event_0wmrvj1">         <dc:Bounds x="242" y="262" width="36" height="36" />       </bpmndi:BPMNShape>     </bpmndi:BPMNPlane>  
                  </bpmndi:BPMNDiagram> </bpmn:definitions>\'';
        $assemble_process = new AssembleProcess();
        $assemble_process->name = $request->name;
        $assemble_process->type = 'r';
        $assemble_process->project_id = $request->project_id;

        $assemble_process->diagram = $diagram;
        $assemble_process->save();

        $project = Project::find($request->project_id);

        return redirect()->route('projects.assemble_process.index', compact('project'))
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
        $assemble_process = AssembleProcess::where('id', $request->assemble_process)->first();
        $project = Project::where('id', $request->project)->first();
        $route = $request->bpmn;
        if ($route == 't') {
            return view('projects.assemble_process.show', compact('assemble_process', 'project'));
        } else
            return view('projects.assemble_process.activities.index', compact('assemble_process', 'project'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $assemble_process = AssembleProcess::where('id', $request->assemble_process)->first();
        $project = Project::where('id', $request->project)->first();
        return view('projects.assemble_process.edit', compact('assemble_process', 'project'));
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


        $assemble_process =  AssembleProcess::find($request->assemble_process);
        if ($request->bpmn == '1') {
            $assemble_process->diagram = $request->diagram;
        } else {
            $request->validate([
                'name' => 'required',
            ]);
        }

        $assemble_process->update($request->all());


        $project = $request->project;


        return redirect()->route('projects.assemble_process.index', compact('project'))
            ->with('success', 'Process information updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, AssembleProcess $assemble_process)
    {
        $assemble_process->delete();

        return redirect()->route('projects.assemble_process.index', compact('project'))
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
