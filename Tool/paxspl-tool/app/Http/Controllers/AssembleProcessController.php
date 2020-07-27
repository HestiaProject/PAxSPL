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
        $diagram = '\'<?xml version="1.0" encoding="UTF-8"?> <bpmn:definitions xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:bpmn="http://www.omg.org/spec/BPMN/20100524/MODEL" xmlns:bpmndi="http://www.omg.org/spec/BPMN/20100524/DI" xmlns:dc="http://www.omg.org/spec/DD/20100524/DC" xmlns:di="http://www.omg.org/spec/DD/20100524/DI" id="Definitions_014zzan" targetNamespace="http://bpmn.io/schema/bpmn" exporter="bpmn-js (https://demo.bpmn.io)" exporterVersion="6.5.1"> <bpmn:collaboration id="Collaboration_0msf5rh"> <bpmn:participant id="Participant_1dpdn6p" name="' . $request->name . '" processRef="Process_0nqp456" /> </bpmn:collaboration> <bpmn:process id="Process_0nqp456" isExecutable="false"> <bpmn:task id="Activity_0b44uyr" name="Extract"> <bpmn:incoming>Flow_1kxq2cg</bpmn:incoming> <bpmn:outgoing>Flow_0owfgc8</bpmn:outgoing> </bpmn:task> <bpmn:task id="Activity_12pbov6" name="Categorize"> <bpmn:incoming>Flow_1ars1q2</bpmn:incoming> <bpmn:outgoing>Flow_1ar5p5p</bpmn:outgoing> </bpmn:task> <bpmn:task id="Activity_18wcxg1" name="Group"> <bpmn:incoming>Flow_11r6qm4</bpmn:incoming> <bpmn:outgoing>Flow_1wl62nw</bpmn:outgoing> </bpmn:task> <bpmn:sequenceFlow id="Flow_06k3lf4" sourceRef="Event_00ivwir" targetRef="Gateway_1uwsken" /> <bpmn:sequenceFlow id="Flow_1kxq2cg" sourceRef="Gateway_1uwsken" targetRef="Activity_0b44uyr" /> <bpmn:sequenceFlow id="Flow_1ars1q2" sourceRef="Gateway_1uwsken" targetRef="Activity_12pbov6" /> <bpmn:inclusiveGateway id="Gateway_1uwsken"> <bpmn:incoming>Flow_06k3lf4</bpmn:incoming> <bpmn:outgoing>Flow_1kxq2cg</bpmn:outgoing> <bpmn:outgoing>Flow_1ars1q2</bpmn:outgoing> <bpmn:outgoing>Flow_11r6qm4</bpmn:outgoing> </bpmn:inclusiveGateway> <bpmn:startEvent id="Event_00ivwir"> <bpmn:outgoing>Flow_06k3lf4</bpmn:outgoing> </bpmn:startEvent> <bpmn:sequenceFlow id="Flow_11r6qm4" sourceRef="Gateway_1uwsken" targetRef="Activity_18wcxg1" /> <bpmn:task id="Activity_1avb052" name="Create Variability Model"> <bpmn:incoming>Flow_0y4tzk7</bpmn:incoming> <bpmn:outgoing>Flow_0ig8sek</bpmn:outgoing> </bpmn:task> <bpmn:sequenceFlow id="Flow_1ar5p5p" sourceRef="Activity_12pbov6" targetRef="Gateway_0sfvc5f" /> <bpmn:inclusiveGateway id="Gateway_0sfvc5f"> <bpmn:incoming>Flow_1ar5p5p</bpmn:incoming> <bpmn:incoming>Flow_0owfgc8</bpmn:incoming> <bpmn:incoming>Flow_1wl62nw</bpmn:incoming> <bpmn:outgoing>Flow_17h083n</bpmn:outgoing> </bpmn:inclusiveGateway> <bpmn:sequenceFlow id="Flow_0owfgc8" sourceRef="Activity_0b44uyr" targetRef="Gateway_0sfvc5f" /> <bpmn:sequenceFlow id="Flow_1wl62nw" sourceRef="Activity_18wcxg1" targetRef="Gateway_0sfvc5f" /> <bpmn:sequenceFlow id="Flow_17h083n" sourceRef="Gateway_0sfvc5f" targetRef="Activity_1olazo9" /> <bpmn:endEvent id="Event_0wmrvj1"> <bpmn:incoming>Flow_0ig8sek</bpmn:incoming> </bpmn:endEvent> <bpmn:sequenceFlow id="Flow_0ig8sek" sourceRef="Activity_1avb052" targetRef="Event_0wmrvj1" /> <bpmn:sequenceFlow id="Flow_07a9jbp" sourceRef="Activity_1olazo9" targetRef="Gateway_0ikfqlc" /> <bpmn:sequenceFlow id="Flow_19pvotl" name="Yes" sourceRef="Gateway_0ikfqlc" targetRef="Activity_0q97njf" /> <bpmn:task id="Activity_1olazo9" name="Check Artifacts"> <bpmn:incoming>Flow_17h083n</bpmn:incoming> <bpmn:incoming>Flow_1sv0mvr</bpmn:incoming> <bpmn:outgoing>Flow_07a9jbp</bpmn:outgoing> </bpmn:task> <bpmn:exclusiveGateway id="Gateway_0ikfqlc" name="Problems?"> <bpmn:incoming>Flow_07a9jbp</bpmn:incoming> <bpmn:outgoing>Flow_19pvotl</bpmn:outgoing> <bpmn:outgoing>Flow_0y4tzk7</bpmn:outgoing> </bpmn:exclusiveGateway> <bpmn:sequenceFlow id="Flow_1sv0mvr" sourceRef="Activity_0q97njf" targetRef="Activity_1olazo9" /> <bpmn:sequenceFlow id="Flow_0y4tzk7" name="No" sourceRef="Gateway_0ikfqlc" targetRef="Activity_1avb052" /> <bpmn:task id="Activity_0q97njf" name="Fix Artifacts"> <bpmn:incoming>Flow_19pvotl</bpmn:incoming> <bpmn:outgoing>Flow_1sv0mvr</bpmn:outgoing> </bpmn:task> </bpmn:process> <bpmndi:BPMNDiagram id="BPMNDiagram_1"> <bpmndi:BPMNPlane id="BPMNPlane_1" bpmnElement="Collaboration_0msf5rh"> <bpmndi:BPMNShape id="Participant_1dpdn6p_di" bpmnElement="Participant_1dpdn6p" isHorizontal="true"> <dc:Bounds x="190" y="40" width="830" height="300" /> </bpmndi:BPMNShape> <bpmndi:BPMNEdge id="Flow_06k3lf4_di" bpmnElement="Flow_06k3lf4"> <di:waypoint x="268" y="180" /> <di:waypoint x="315" y="180" /> </bpmndi:BPMNEdge> <bpmndi:BPMNEdge id="Flow_1kxq2cg_di" bpmnElement="Flow_1kxq2cg"> <di:waypoint x="340" y="155" /> <di:waypoint x="340" y="90" /> 
        <di:waypoint x="430" y="90" /> </bpmndi:BPMNEdge> <bpmndi:BPMNEdge id="Flow_1ars1q2_di" bpmnElement="Flow_1ars1q2"> <di:waypoint x="365" y="180" /> <di:waypoint x="430" y="180" /> </bpmndi:BPMNEdge> <bpmndi:BPMNEdge id="Flow_11r6qm4_di" bpmnElement="Flow_11r6qm4"> <di:waypoint x="340" y="205" /> <di:waypoint x="340" y="280" /> <di:waypoint x="430" y="280" /> </bpmndi:BPMNEdge> <bpmndi:BPMNEdge id="Flow_1ar5p5p_di" bpmnElement="Flow_1ar5p5p"> <di:waypoint x="530" y="180" /> <di:waypoint x="585" y="180" /> </bpmndi:BPMNEdge> <bpmndi:BPMNEdge id="Flow_0owfgc8_di" bpmnElement="Flow_0owfgc8"> <di:waypoint x="530" y="90" /> <di:waypoint x="610" y="90" /> <di:waypoint x="610" y="155" /> </bpmndi:BPMNEdge> <bpmndi:BPMNEdge id="Flow_1wl62nw_di" bpmnElement="Flow_1wl62nw"> <di:waypoint x="530" y="280" /> <di:waypoint x="610" y="280" /> <di:waypoint x="610" y="205" /> </bpmndi:BPMNEdge> <bpmndi:BPMNEdge id="Flow_17h083n_di" bpmnElement="Flow_17h083n"> <di:waypoint x="635" y="180" /> <di:waypoint x="660" y="180" /> <di:waypoint x="660" y="120" /> <di:waypoint x="690" y="120" /> </bpmndi:BPMNEdge> <bpmndi:BPMNEdge id="Flow_0ig8sek_di" bpmnElement="Flow_0ig8sek"> <di:waypoint x="800" y="250" /> <di:waypoint x="902" y="250" /> </bpmndi:BPMNEdge> <bpmndi:BPMNEdge id="Flow_07a9jbp_di" bpmnElement="Flow_07a9jbp"> <di:waypoint x="790" y="120" /> <di:waypoint x="815" y="120" /> </bpmndi:BPMNEdge> <bpmndi:BPMNEdge id="Flow_19pvotl_di" bpmnElement="Flow_19pvotl"> <di:waypoint x="865" y="120" /> <di:waypoint x="900" y="120" /> <bpmndi:BPMNLabel> <dc:Bounds x="874" y="102" width="18" height="14" /> </bpmndi:BPMNLabel> </bpmndi:BPMNEdge> <bpmndi:BPMNEdge id="Flow_1sv0mvr_di" bpmnElement="Flow_1sv0mvr"> <di:waypoint x="950" y="80" /> <di:waypoint x="950" y="50" /> <di:waypoint x="740" y="50" /> <di:waypoint x="740" y="80" /> </bpmndi:BPMNEdge> <bpmndi:BPMNEdge id="Flow_0y4tzk7_di" bpmnElement="Flow_0y4tzk7"> <di:waypoint x="840" y="145" /> <di:waypoint x="840" y="180" /> <di:waypoint x="750" y="180" /> <di:waypoint x="750" y="210" /> <bpmndi:BPMNLabel> <dc:Bounds x="762" y="188" width="15" height="14" /> </bpmndi:BPMNLabel> </bpmndi:BPMNEdge> <bpmndi:BPMNShape id="Activity_0b44uyr_di" bpmnElement="Activity_0b44uyr"> <dc:Bounds x="430" y="50" width="100" height="80" /> </bpmndi:BPMNShape> <bpmndi:BPMNShape id="Activity_12pbov6_di" bpmnElement="Activity_12pbov6"> <dc:Bounds x="430" y="140" width="100" height="80" /> </bpmndi:BPMNShape> <bpmndi:BPMNShape id="Activity_18wcxg1_di" bpmnElement="Activity_18wcxg1"> <dc:Bounds x="430" y="240" width="100" height="80" /> </bpmndi:BPMNShape> <bpmndi:BPMNShape id="Gateway_1gwgry8_di" bpmnElement="Gateway_1uwsken"> <dc:Bounds x="315" y="155" width="50" height="50" /> </bpmndi:BPMNShape> <bpmndi:BPMNShape id="Event_00ivwir_di" bpmnElement="Event_00ivwir"> <dc:Bounds x="232" y="162" width="36" height="36" /> </bpmndi:BPMNShape> <bpmndi:BPMNShape id="Activity_1avb052_di" bpmnElement="Activity_1avb052"> <dc:Bounds x="700" y="210" width="100" height="80" /> </bpmndi:BPMNShape> <bpmndi:BPMNShape id="Gateway_1ftgzeb_di" bpmnElement="Gateway_0sfvc5f"> <dc:Bounds x="585" y="155" width="50" height="50" /> </bpmndi:BPMNShape> <bpmndi:BPMNShape id="Activity_1olazo9_di" bpmnElement="Activity_1olazo9"> <dc:Bounds x="690" y="80" width="100" height="80" /> </bpmndi:BPMNShape> <bpmndi:BPMNShape id="Event_0wmrvj1_di" bpmnElement="Event_0wmrvj1"> <dc:Bounds x="902" y="232" width="36" height="36" /> </bpmndi:BPMNShape> <bpmndi:BPMNShape id="Gateway_0ikfqlc_di" bpmnElement="Gateway_0ikfqlc" isMarkerVisible="true"> <dc:Bounds x="815" y="95" width="50" height="50" /> <bpmndi:BPMNLabel> <dc:Bounds x="813" y="71" width="53" height="14" /> </bpmndi:BPMNLabel> </bpmndi:BPMNShape> <bpmndi:BPMNShape id="Activity_0q97njf_di" bpmnElement="Activity_0q97njf"> <dc:Bounds x="900" y="80" width="100" height="80" /> </bpmndi:BPMNShape> </bpmndi:BPMNPlane> </bpmndi:BPMNDiagram> </bpmn:definitions> \'';
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
