-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Jun-2020 às 20:55
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `paxspl`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `activities`
--

CREATE TABLE `activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'created',
  `assemble_process_id` int(10) UNSIGNED NOT NULL,
  `technique_id` int(10) UNSIGNED NOT NULL,
  `phase_id` int(11) NOT NULL DEFAULT 1,
  `experience_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `activities`
--

INSERT INTO `activities` (`id`, `created_at`, `updated_at`, `name`, `phase`, `order`, `description`, `status`, `assemble_process_id`, `technique_id`, `phase_id`, `experience_id`) VALUES
(1, '2020-04-15 22:31:53', '2020-06-06 21:40:22', 'Apply FCA into requirements', 'extract', 1, 'FCA must be applied into the requirements to retrieve the features identified among the software products.', 'done', 1, 4, 1, 8),
(2, '2020-04-15 22:40:56', '2020-06-06 21:38:16', 'Apply LSI into source code', 'extract', 1, 'd', 'done', 1, 5, 1, 5),
(5, '2020-04-17 23:42:15', '2020-06-06 21:38:11', 'Test', 'categorize', 1, 'fa', 'done', 1, 4, 2, NULL),
(15, '2020-04-19 03:09:46', '2020-05-12 22:58:46', 'Define Metrics for Scoping', 'SupportS', 1, 'Define the metrics that will be used for Scoping', 'done', 7, 18, 0, NULL),
(16, '2020-04-19 03:10:57', '2020-05-12 22:40:58', 'Analyze the market', 'domain', 1, 'Find potential for the SPL', 'doing', 7, 10, 1, NULL),
(17, '2020-05-24 10:54:52', '2020-06-09 07:32:34', 'Divide features with LSI', 'extract', 1, 'Use LSI to divide features and classes into common and variable partitions;', 'done', 8, 5, 1, NULL),
(18, '2020-05-24 10:55:25', '2020-05-27 14:24:02', 'Fragment variable partitions with FCA', 'extract', 2, 'Fragment variable partitions into minimal disjoint sets using FCA', 'done', 8, 4, 1, NULL),
(20, '2020-05-24 11:02:43', '2020-05-27 14:25:21', 'Derive code-topics from common class partitions;', 'group', 1, 'Code-topics are derived based on their common class partitions;', 'done', 8, 1, 3, NULL),
(21, '2020-05-24 11:11:36', '2020-05-27 14:29:11', 'Perform traceability links between features and code-topics;', 'fm', 1, 'Analyzed and perform the traceability links between features and their code-topics;', 'done', 8, 5, 4, NULL),
(22, '2020-05-24 11:14:12', '2020-05-27 14:30:45', 'Determine feature implementation', 'fm', 2, 'determine which classes implement each feature.', 'done', 8, 9, 4, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `activities_artifacts`
--

CREATE TABLE `activities_artifacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `io` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_id` int(10) UNSIGNED NOT NULL,
  `artifact_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'created',
  `obs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `activities_artifacts`
--

INSERT INTO `activities_artifacts` (`id`, `created_at`, `updated_at`, `io`, `activity_id`, `artifact_id`, `status`, `obs`) VALUES
(1, '2020-05-09 22:15:25', '2020-05-09 22:15:25', 'i', 2, 12, 'created', NULL),
(5, '2020-05-09 22:40:46', '2020-05-09 22:40:46', 'i', 2, 12, 'created', NULL),
(6, '2020-05-09 22:44:56', '2020-05-09 22:44:56', 'i', 2, 14, 'created', NULL),
(7, '2020-05-09 22:48:17', '2020-05-09 22:48:17', 'i', 1, 14, 'created', NULL),
(8, '2020-05-09 22:48:33', '2020-05-14 03:51:44', 'o', 1, 15, 'checked', 'erros found'),
(9, '2020-05-09 23:12:54', '2020-05-09 23:12:54', 'i', 2, 5, 'created', NULL),
(11, '2020-05-11 22:08:31', '2020-05-11 22:08:31', 'i', 16, 7, 'created', NULL),
(12, '2020-05-11 22:08:56', '2020-05-14 04:08:45', 'o', 16, 16, 'checked', 'found this'),
(13, '2020-05-11 22:09:08', '2020-05-11 22:09:08', 'i', 16, 16, 'created', NULL),
(14, '2020-05-13 00:33:49', '2020-05-14 03:24:02', 'o', 2, 17, 'problem', '123'),
(16, '2020-05-14 03:34:18', '2020-05-14 03:34:42', 'o', 1, 19, 'problem', '2'),
(17, '2020-05-27 14:21:43', '2020-05-27 14:21:43', 'i', 17, 20, 'created', NULL),
(18, '2020-05-27 14:21:47', '2020-05-27 14:21:47', 'i', 17, 21, 'created', NULL),
(19, '2020-05-27 14:23:00', '2020-06-11 01:51:17', 'o', 17, 22, 'checked', NULL),
(20, '2020-05-27 14:23:11', '2020-05-27 14:23:11', 'i', 18, 20, 'created', NULL),
(21, '2020-05-27 14:23:15', '2020-05-27 14:23:15', 'i', 18, 21, 'created', NULL),
(22, '2020-05-27 14:23:54', '2020-05-27 14:23:54', 'o', 18, 23, 'created', NULL),
(23, '2020-05-27 14:24:00', '2020-05-27 14:24:00', 'i', 18, 22, 'created', NULL),
(24, '2020-05-27 14:24:14', '2020-05-27 14:24:14', 'i', 20, 22, 'created', NULL),
(25, '2020-05-27 14:24:19', '2020-05-27 14:24:19', 'i', 20, 23, 'created', NULL),
(26, '2020-05-27 14:25:20', '2020-05-27 14:25:20', 'o', 20, 24, 'created', NULL),
(27, '2020-05-27 14:28:21', '2020-05-27 14:28:21', 'i', 21, 24, 'created', NULL),
(28, '2020-05-27 14:29:10', '2020-05-27 14:29:10', 'o', 21, 25, 'created', NULL),
(29, '2020-05-27 14:29:29', '2020-05-27 14:29:29', 'i', 22, 24, 'created', NULL),
(30, '2020-05-27 14:29:35', '2020-05-27 14:29:35', 'i', 22, 25, 'created', NULL),
(31, '2020-05-27 14:30:44', '2020-05-27 14:30:44', 'o', 22, 26, 'created', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `artifacts`
--

CREATE TABLE `artifacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `external_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_update_date` timestamp NULL DEFAULT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `last_update_user` bigint(20) UNSIGNED NOT NULL,
  `owner_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `artifacts`
--

INSERT INTO `artifacts` (`id`, `name`, `description`, `external_link`, `created_at`, `updated_at`, `last_update_date`, `project_id`, `last_update_user`, `owner_id`, `type`, `extension`) VALUES
(5, 'Use case specification 2', 'fa', 'https://github.com/HestiaProject/PAxSPL/wiki/Artifacts-Description#artifacts-type-specification', '2020-01-28 22:04:13', '2020-02-29 09:07:38', '2020-02-29 09:07:38', 1, 1, 1, 'Requirements', 'doc'),
(7, 'Domain Glossary', 'Domain Glossary', '53', '2020-02-01 21:34:33', '2020-02-20 02:24:01', '2020-02-20 02:24:01', 1, 1, 1, 'Domain', '.pdf'),
(10, 'a', 'a', 'a', '2020-03-01 00:48:55', '2020-03-01 00:48:55', '2020-03-01 00:48:55', 2, 1, 1, 'Domain', 'a'),
(12, 'Source Code', 'fa\\', 'fa', '2020-03-02 03:37:38', '2020-04-17 23:44:00', '2020-04-17 23:44:00', 1, 1, 1, 'Development', 'fa'),
(14, 'Novo Artifact 323', 'testando', 'https://github.com/HestiaProject/PAxSPL/wiki/Artifacts-Description', '2020-05-09 22:21:29', '2020-05-09 23:06:19', '2020-05-09 23:06:19', 1, 1, 1, 'Domain', '.doc'),
(15, 'novo 36', 'Sempre', 'https://github.com/HestiaProject/PAxSPL/wiki/Artifacts-Description', '2020-05-09 22:48:32', '2020-05-14 03:51:05', '2020-05-14 03:51:05', 1, 1, 1, 'Design', '.pdf'),
(16, 'New Artifact 320', 'testa', 'https://laravel.com/docs/7.x/controllers', '2020-05-11 22:08:56', '2020-05-14 04:08:24', '2020-05-14 04:08:24', 1, 1, 1, 'Design', 'test'),
(17, 'newwww', 'fa', 'af', '2020-05-13 00:33:49', '2020-05-13 00:33:49', '2020-05-13 00:33:49', 1, 1, 1, 'Domain', 'fa'),
(18, 'aluradao', 'fixed', 'f', '2020-05-13 00:34:09', '2020-05-14 03:48:22', '2020-05-14 03:48:22', 1, 1, 1, 'Domain', 'f'),
(19, '33', '3', '3', '2020-05-14 03:34:18', '2020-05-14 03:34:18', '2020-05-14 03:34:18', 1, 1, 1, 'Domain', '3'),
(20, 'Objected-oriented Source Code', 'Souce code of the argoUML', 'https://github.com/argouml-tigris-org/argouml', '2020-05-24 10:50:27', '2020-05-24 10:50:27', '2020-05-24 10:50:27', 6, 1, 1, 'Development', '.java'),
(21, 'Feature Description', 'Description of features of the argoUML system.', 'https://github.com/argouml-tigris-org/argouml', '2020-05-24 10:52:03', '2020-05-24 10:52:03', '2020-05-24 10:52:03', 6, 1, 1, 'Domain', '.doc'),
(22, 'Common and variable partitions', 'Classes that implement common and optional features', 'https://github.com/argouml-tigris-org/argouml', '2020-05-27 14:23:00', '2020-05-27 14:31:59', '2020-05-27 14:31:59', 6, 1, 1, 'Development', '.lsi'),
(23, 'Minimal disjoint sets', 'Variable partitions are fragmented into minimal disjoint sets using FCA.', 'https://github.com/argouml-tigris-org/argouml', '2020-05-27 14:23:54', '2020-05-27 14:32:11', '2020-05-27 14:32:11', 6, 1, 1, 'Development', '.fca'),
(24, 'Code-topics', 'Code-topics derived from common class partition and each minimal disjoint set of classes', 'https://github.com/argouml-tigris-org/argouml', '2020-05-27 14:25:20', '2020-05-27 14:25:20', '2020-05-27 14:25:20', 6, 1, 1, 'Development', '.topic'),
(25, 'Traceability links', 'Traceability links between features and their possible corresponding code-topics', 'https://github.com/argouml-tigris-org/argouml', '2020-05-27 14:29:10', '2020-05-27 14:29:10', '2020-05-27 14:29:10', 6, 1, 1, 'Development', '.lsi'),
(26, 'Decomposed code-topics', 'Decomposed code-topic to its classes determining which classes that implement each feature.', 'https://github.com/argouml-tigris-org/argouml', '2020-05-27 14:30:44', '2020-05-27 14:30:44', '2020-05-27 14:30:44', 6, 1, 1, 'Development', '.topic');

-- --------------------------------------------------------

--
-- Estrutura da tabela `assemble_processes`
--

CREATE TABLE `assemble_processes` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'created',
  `project_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagram` text COLLATE utf8mb4_unicode_ci DEFAULT '\'<?xml version="1.0" encoding="UTF-8"?> <bpmn:definitions xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:bpmn="http://www.omg.org/spec/BPMN/20100524/MODEL" xmlns:bpmndi="http://www.omg.org/spec/BPMN/20100524/DI" xmlns:dc="http://www.omg.org/spec/DD/20100524/DC" xmlns:di="http://www.omg.org/spec/DD/20100524/DI" id="Definitions_014zzan" targetNamespace="http://bpmn.io/schema/bpmn" exporter="bpmn-js (https://demo.bpmn.io)" exporterVersion="6.5.1">   <bpmn:collaboration id="Collaboration_0msf5rh">     <bpmn:participant id="Participant_1dpdn6p" name="Generic Process" processRef="Process_0nqp456" />   </bpmn:collaboration>   <bpmn:process id="Process_0nqp456" isExecutable="false">     <bpmn:startEvent id="Event_00ivwir">       <bpmn:outgoing>Flow_0ufuik6</bpmn:outgoing>     </bpmn:startEvent>     <bpmn:task id="Activity_0b44uyr" name="Extract">       <bpmn:incoming>Flow_0ufuik6</bpmn:incoming>       <bpmn:incoming>Flow_1x1en9f</bpmn:incoming>       <bpmn:outgoing>Flow_0jlqzbv</bpmn:outgoing>     </bpmn:task>     <bpmn:sequenceFlow id="Flow_0ufuik6" sourceRef="Event_00ivwir" targetRef="Activity_0b44uyr" />     <bpmn:exclusiveGateway id="Gateway_0a2g599" name="Check">       <bpmn:incoming>Flow_0jlqzbv</bpmn:incoming>       <bpmn:outgoing>Flow_1x1en9f</bpmn:outgoing>       <bpmn:outgoing>Flow_1yadp7s</bpmn:outgoing>     </bpmn:exclusiveGateway>     <bpmn:sequenceFlow id="Flow_0jlqzbv" sourceRef="Activity_0b44uyr" targetRef="Gateway_0a2g599" />     <bpmn:sequenceFlow id="Flow_1x1en9f" name="Not Ok" sourceRef="Gateway_0a2g599" targetRef="Activity_0b44uyr" />     <bpmn:exclusiveGateway id="Gateway_190p5r1" name="Check">       <bpmn:incoming>Flow_14xplzk</bpmn:incoming>       <bpmn:outgoing>Flow_1r5ghn4</bpmn:outgoing>       <bpmn:outgoing>Flow_0bacyby</bpmn:outgoing>     </bpmn:exclusiveGateway>     <bpmn:sequenceFlow id="Flow_1r5ghn4" name="Not Ok" sourceRef="Gateway_190p5r1" targetRef="Activity_12pbov6" />     <bpmn:task id="Activity_12pbov6" name="Categorize">       <bpmn:incoming>Flow_1yadp7s</bpmn:incoming>       <bpmn:incoming>Flow_1r5ghn4</bpmn:incoming>       <bpmn:outgoing>Flow_14xplzk</bpmn:outgoing>     </bpmn:task>     <bpmn:sequenceFlow id="Flow_14xplzk" sourceRef="Activity_12pbov6" targetRef="Gateway_190p5r1" />     <bpmn:sequenceFlow id="Flow_1yadp7s" name="Ok" sourceRef="Gateway_0a2g599" targetRef="Activity_12pbov6" />     <bpmn:task id="Activity_18wcxg1" name="Group">       <bpmn:incoming>Flow_0bacyby</bpmn:incoming>       <bpmn:incoming>Flow_1qztjd5</bpmn:incoming>       <bpmn:outgoing>Flow_1v39yum</bpmn:outgoing>     </bpmn:task>     <bpmn:sequenceFlow id="Flow_0bacyby" name="Ok" sourceRef="Gateway_190p5r1" targetRef="Activity_18wcxg1" />     <bpmn:exclusiveGateway id="Gateway_1ssqwu7" name="Check">       <bpmn:incoming>Flow_1v39yum</bpmn:incoming>       <bpmn:outgoing>Flow_1qztjd5</bpmn:outgoing>       <bpmn:outgoing>Flow_056edb0</bpmn:outgoing>     </bpmn:exclusiveGateway>     <bpmn:sequenceFlow id="Flow_1v39yum" sourceRef="Activity_18wcxg1" targetRef="Gateway_1ssqwu7" />     <bpmn:sequenceFlow id="Flow_1qztjd5" name="Not Ok" sourceRef="Gateway_1ssqwu7" targetRef="Activity_18wcxg1" />     <bpmn:task id="Activity_1avb052" name="Create Feature Model">       <bpmn:incoming>Flow_056edb0</bpmn:incoming>       <bpmn:incoming>Flow_0lst3zv</bpmn:incoming>       <bpmn:outgoing>Flow_0mz8g4i</bpmn:outgoing>     </bpmn:task>     <bpmn:sequenceFlow id="Flow_056edb0" name="Ok" sourceRef="Gateway_1ssqwu7" targetRef="Activity_1avb052" />     <bpmn:exclusiveGateway id="Gateway_0balowq" name="Check">       <bpmn:incoming>Flow_0mz8g4i</bpmn:incoming>       <bpmn:outgoing>Flow_0qplcfp</bpmn:outgoing>       <bpmn:outgoing>Flow_0lst3zv</bpmn:outgoing>     </bpmn:exclusiveGateway>     <bpmn:sequenceFlow id="Flow_0mz8g4i" sourceRef="Activity_1avb052" targetRef="Gateway_0balowq" />     <bpmn:endEvent id="Event_0wmrvj1">       <bpmn:incoming>Flow_0qplcfp</bpmn:incoming>     </bpmn:endEvent>     <bpmn:sequenceFlow id="Flow_0qplcfp" name="Ok" sourceRef="Gateway_0balowq" targetRef="Event_0wmrvj1" />     <bpmn:sequenceFlow id="Flow_0lst3zv" name="Not Ok" sourceRef="Gateway_0balowq" targetRef="Activity_1avb052" />   </bpmn:process>   <bpmndi:BPMNDiagram id="BPMNDiagram_1">     <bpmndi:BPMNPlane id="BPMNPlane_1" bpmnElement="Collaboration_0msf5rh">       <bpmndi:BPMNShape id="Participant_1dpdn6p_di" bpmnElement="Participant_1dpdn6p" isHorizontal="true">         <dc:Bounds x="190" y="40" width="710" height="310" />       </bpmndi:BPMNShape>       <bpmndi:BPMNEdge id="Flow_0ufuik6_di" bpmnElement="Flow_0ufuik6">         <di:waypoint x="278" y="150" />         <di:waypoint x="340" y="150" />       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_0jlqzbv_di" bpmnElement="Flow_0jlqzbv">         <di:waypoint x="440" y="150" />         <di:waypoint x="515" y="150" />       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_1x1en9f_di" bpmnElement="Flow_1x1en9f">         <di:waypoint x="540" y="125" />         <di:waypoint x="540" y="50" />         <di:waypoint x="390" y="50" />         <di:waypoint x="390" y="110" />         <bpmndi:BPMNLabel>           <dc:Bounds x="448" y="53" width="35" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_1yadp7s_di" bpmnElement="Flow_1yadp7s">         <di:waypoint x="565" y="150" />         <di:waypoint x="640" y="150" />         <bpmndi:BPMNLabel>           <dc:Bounds x="595" y="132" width="15" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_14xplzk_di" bpmnElement="Flow_14xplzk">         <di:waypoint x="740" y="150" />         <di:waypoint x="805" y="150" />       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_1r5ghn4_di" bpmnElement="Flow_1r5ghn4">         <di:waypoint x="830" y="125" />         <di:waypoint x="830" y="50" />         <di:waypoint x="690" y="50" />         <di:waypoint x="690" y="110" />         <bpmndi:BPMNLabel>           <dc:Bounds x="743" y="53" width="35" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_0bacyby_di" bpmnElement="Flow_0bacyby">         <di:waypoint x="830" y="175" />         <di:waypoint x="830" y="240" />         <bpmndi:BPMNLabel>           <dc:Bounds x="838" y="205" width="15" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_1v39yum_di" bpmnElement="Flow_1v39yum">         <di:waypoint x="780" y="280" />         <di:waypoint x="715" y="280" />       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_1qztjd5_di" bpmnElement="Flow_1qztjd5">         <di:waypoint x="690" y="255" />         <di:waypoint x="690" y="200" />         <di:waypoint x="790" y="200" />         <di:waypoint x="790" y="240" />         <bpmndi:BPMNLabel>           <dc:Bounds x="723" y="203" width="35" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_056edb0_di" bpmnElement="Flow_056edb0">         <di:waypoint x="665" y="280" />         <di:waypoint x="570" y="280" />         <bpmndi:BPMNLabel>           <dc:Bounds x="610" y="262" width="15" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_0mz8g4i_di" bpmnElement="Flow_0mz8g4i">         <di:waypoint x="470" y="280" />         <di:waypoint x="395" y="280" />       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_0qplcfp_di" bpmnElement="Flow_0qplcfp">         <di:waypoint x="345" y="280" />         <di:waypoint x="278" y="280" />         <bpmndi:BPMNLabel>           <dc:Bounds x="304" y="262" width="15" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_0lst3zv_di" bpmnElement="Flow_0lst3zv">         <di:waypoint x="370" y="255" />         <di:waypoint x="370" y="200" />         <di:waypoint x="490" y="200" />         <di:waypoint x="490" y="240" />         <bpmndi:BPMNLabel>           <dc:Bounds x="413" y="203" width="35" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNShape id="Event_00ivwir_di" bpmnElement="Event_00ivwir">         <dc:Bounds x="242" y="132" width="36" height="36" />       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Activity_0b44uyr_di" bpmnElement="Activity_0b44uyr">         <dc:Bounds x="340" y="110" width="100" height="80" />       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Gateway_0a2g599_di" bpmnElement="Gateway_0a2g599" isMarkerVisible="true">         <dc:Bounds x="515" y="125" width="50" height="50" />         <bpmndi:BPMNLabel>           <dc:Bounds x="524" y="182" width="32" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Activity_12pbov6_di" bpmnElement="Activity_12pbov6">         <dc:Bounds x="640" y="110" width="100" height="80" />       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Gateway_190p5r1_di" bpmnElement="Gateway_190p5r1" isMarkerVisible="true">         <dc:Bounds x="805" y="125" width="50" height="50" />         <bpmndi:BPMNLabel>           <dc:Bounds x="844" y="163" width="32" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Activity_18wcxg1_di" bpmnElement="Activity_18wcxg1">         <dc:Bounds x="780" y="240" width="100" height="80" />       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Gateway_1ssqwu7_di" bpmnElement="Gateway_1ssqwu7" isMarkerVisible="true">         <dc:Bounds x="665" y="255" width="50" height="50" />         <bpmndi:BPMNLabel>           <dc:Bounds x="674" y="312" width="32" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Activity_1avb052_di" bpmnElement="Activity_1avb052">         <dc:Bounds x="470" y="240" width="100" height="80" />       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Gateway_0balowq_di" bpmnElement="Gateway_0balowq" isMarkerVisible="true">         <dc:Bounds x="345" y="255" width="50" height="50" />         <bpmndi:BPMNLabel>           <dc:Bounds x="354" y="312" width="32" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Event_0wmrvj1_di" bpmnElement="Event_0wmrvj1">         <dc:Bounds x="242" y="262" width="36" height="36" />       </bpmndi:BPMNShape>     </bpmndi:BPMNPlane>   </bpmndi:BPMNDiagram> </bpmn:definitions>\''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `assemble_processes`
--

INSERT INTO `assemble_processes` (`id`, `created_at`, `updated_at`, `name`, `status`, `project_id`, `type`, `diagram`) VALUES
(1, '2020-04-15 22:30:17', '2020-04-15 22:30:17', 'p1', 'created', 1, 'r', NULL),
(2, '2020-04-19 01:20:14', '2020-04-19 01:20:14', 'Test', 'created', 1, 'r', NULL),
(7, '2020-04-19 01:41:58', '2020-04-19 01:41:58', 'Scop 3', 'created', 1, 's', NULL),
(8, '2020-05-24 10:54:22', '2020-05-27 13:54:16', 'Retrieval Process', 'created', 6, 'r', '\'<?xml version=\"1.0\" encoding=\"UTF-8\"?>\r\n<bpmn:definitions xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:bpmn=\"http://www.omg.org/spec/BPMN/20100524/MODEL\" xmlns:bpmndi=\"http://www.omg.org/spec/BPMN/20100524/DI\" xmlns:dc=\"http://www.omg.org/spec/DD/20100524/DC\" xmlns:di=\"http://www.omg.org/spec/DD/20100524/DI\" id=\"Definitions_014zzan\" targetNamespace=\"http://bpmn.io/schema/bpmn\" exporter=\"bpmn-js (https://demo.bpmn.io)\" exporterVersion=\"6.5.1\">\r\n  <bpmn:collaboration id=\"Collaboration_0msf5rh\">\r\n    <bpmn:participant id=\"Participant_1dpdn6p\" name=\"Assembled Process\" processRef=\"Process_0nqp456\" />\r\n  </bpmn:collaboration>\r\n  <bpmn:process id=\"Process_0nqp456\" isExecutable=\"false\">\r\n    <bpmn:startEvent id=\"Event_00ivwir\">\r\n      <bpmn:outgoing>Flow_0ufuik6</bpmn:outgoing>\r\n    </bpmn:startEvent>\r\n    <bpmn:task id=\"Activity_0b44uyr\" name=\"Divide features with LSI\">\r\n      <bpmn:incoming>Flow_0ufuik6</bpmn:incoming>\r\n      <bpmn:incoming>Flow_1x1en9f</bpmn:incoming>\r\n      <bpmn:outgoing>Flow_0jlqzbv</bpmn:outgoing>\r\n    </bpmn:task>\r\n    <bpmn:sequenceFlow id=\"Flow_0ufuik6\" sourceRef=\"Event_00ivwir\" targetRef=\"Activity_0b44uyr\" />\r\n    <bpmn:exclusiveGateway id=\"Gateway_0a2g599\" name=\"Check\">\r\n      <bpmn:incoming>Flow_0jlqzbv</bpmn:incoming>\r\n      <bpmn:outgoing>Flow_1x1en9f</bpmn:outgoing>\r\n      <bpmn:outgoing>Flow_1yadp7s</bpmn:outgoing>\r\n    </bpmn:exclusiveGateway>\r\n    <bpmn:sequenceFlow id=\"Flow_0jlqzbv\" sourceRef=\"Activity_0b44uyr\" targetRef=\"Gateway_0a2g599\" />\r\n    <bpmn:sequenceFlow id=\"Flow_1x1en9f\" name=\"Not Ok\" sourceRef=\"Gateway_0a2g599\" targetRef=\"Activity_0b44uyr\" />\r\n    <bpmn:exclusiveGateway id=\"Gateway_190p5r1\" name=\"Check\">\r\n      <bpmn:incoming>Flow_14xplzk</bpmn:incoming>\r\n      <bpmn:outgoing>Flow_1r5ghn4</bpmn:outgoing>\r\n      <bpmn:outgoing>Flow_0bacyby</bpmn:outgoing>\r\n    </bpmn:exclusiveGateway>\r\n    <bpmn:sequenceFlow id=\"Flow_1r5ghn4\" name=\"Not Ok\" sourceRef=\"Gateway_190p5r1\" targetRef=\"Activity_12pbov6\" />\r\n    <bpmn:task id=\"Activity_12pbov6\" name=\"Fragment variable partitions with FCA\">\r\n      <bpmn:incoming>Flow_1yadp7s</bpmn:incoming>\r\n      <bpmn:incoming>Flow_1r5ghn4</bpmn:incoming>\r\n      <bpmn:outgoing>Flow_14xplzk</bpmn:outgoing>\r\n    </bpmn:task>\r\n    <bpmn:sequenceFlow id=\"Flow_14xplzk\" sourceRef=\"Activity_12pbov6\" targetRef=\"Gateway_190p5r1\" />\r\n    <bpmn:sequenceFlow id=\"Flow_1yadp7s\" name=\"Ok\" sourceRef=\"Gateway_0a2g599\" targetRef=\"Activity_12pbov6\" />\r\n    <bpmn:sequenceFlow id=\"Flow_0bacyby\" name=\"Ok\" sourceRef=\"Gateway_190p5r1\" targetRef=\"Activity_18wcxg1\" />\r\n    <bpmn:task id=\"Activity_18wcxg1\" name=\"Derive code-topics from common class partitions;\">\r\n      <bpmn:incoming>Flow_0bacyby</bpmn:incoming>\r\n      <bpmn:incoming>Flow_1qztjd5</bpmn:incoming>\r\n      <bpmn:outgoing>Flow_1v39yum</bpmn:outgoing>\r\n    </bpmn:task>\r\n    <bpmn:exclusiveGateway id=\"Gateway_1ssqwu7\" name=\"Check\">\r\n      <bpmn:incoming>Flow_1v39yum</bpmn:incoming>\r\n      <bpmn:outgoing>Flow_1qztjd5</bpmn:outgoing>\r\n      <bpmn:outgoing>Flow_056edb0</bpmn:outgoing>\r\n    </bpmn:exclusiveGateway>\r\n    <bpmn:task id=\"Activity_1avb052\" name=\"Perform traceability links between features and  code-topics;\">\r\n      <bpmn:incoming>Flow_056edb0</bpmn:incoming>\r\n      <bpmn:incoming>Flow_0lst3zv</bpmn:incoming>\r\n      <bpmn:outgoing>Flow_0mz8g4i</bpmn:outgoing>\r\n    </bpmn:task>\r\n    <bpmn:exclusiveGateway id=\"Gateway_0balowq\" name=\"Check\">\r\n      <bpmn:incoming>Flow_0mz8g4i</bpmn:incoming>\r\n      <bpmn:outgoing>Flow_0lst3zv</bpmn:outgoing>\r\n      <bpmn:outgoing>Flow_1lwp680</bpmn:outgoing>\r\n    </bpmn:exclusiveGateway>\r\n    <bpmn:task id=\"Activity_03qxj4x\" name=\"Determine feature implementation\">\r\n      <bpmn:incoming>Flow_1lwp680</bpmn:incoming>\r\n      <bpmn:incoming>Flow_032gd26</bpmn:incoming>\r\n      <bpmn:outgoing>Flow_0vd0efi</bpmn:outgoing>\r\n    </bpmn:task>\r\n    <bpmn:sequenceFlow id=\"Flow_1qztjd5\" name=\"Not Ok\" sourceRef=\"Gateway_1ssqwu7\" targetRef=\"Activity_18wcxg1\" />\r\n    <bpmn:sequenceFlow id=\"Flow_1v39yum\" sourceRef=\"Activity_18wcxg1\" targetRef=\"Gateway_1ssqwu7\" />\r\n    <bpmn:sequenceFlow id=\"Flow_056edb0\" name=\"Ok\" sourceRef=\"Gateway_1ssqwu7\" targetRef=\"Activity_1avb052\" />\r\n    <bpmn:sequenceFlow id=\"Flow_0lst3zv\" name=\"Not Ok\" sourceRef=\"Gateway_0balowq\" targetRef=\"Activity_1avb052\" />\r\n    <bpmn:sequenceFlow id=\"Flow_0mz8g4i\" sourceRef=\"Activity_1avb052\" targetRef=\"Gateway_0balowq\" />\r\n    <bpmn:sequenceFlow id=\"Flow_1lwp680\" name=\"Ok\" sourceRef=\"Gateway_0balowq\" targetRef=\"Activity_03qxj4x\" />\r\n    <bpmn:endEvent id=\"Event_0wmrvj1\">\r\n      <bpmn:incoming>Flow_0kfbf9s</bpmn:incoming>\r\n    </bpmn:endEvent>\r\n    <bpmn:exclusiveGateway id=\"Gateway_1p20o9b\" name=\"Check\">\r\n      <bpmn:incoming>Flow_0vd0efi</bpmn:incoming>\r\n      <bpmn:outgoing>Flow_0kfbf9s</bpmn:outgoing>\r\n      <bpmn:outgoing>Flow_032gd26</bpmn:outgoing>\r\n    </bpmn:exclusiveGateway>\r\n    <bpmn:sequenceFlow id=\"Flow_0vd0efi\" sourceRef=\"Activity_03qxj4x\" targetRef=\"Gateway_1p20o9b\" />\r\n    <bpmn:sequenceFlow id=\"Flow_0kfbf9s\" name=\"Ok\" sourceRef=\"Gateway_1p20o9b\" targetRef=\"Event_0wmrvj1\" />\r\n    <bpmn:sequenceFlow id=\"Flow_032gd26\" name=\"Not Ok\" sourceRef=\"Gateway_1p20o9b\" targetRef=\"Activity_03qxj4x\" />\r\n  </bpmn:process>\r\n  <bpmndi:BPMNDiagram id=\"BPMNDiagram_1\">\r\n    <bpmndi:BPMNPlane id=\"BPMNPlane_1\" bpmnElement=\"Collaboration_0msf5rh\">\r\n      <bpmndi:BPMNShape id=\"Participant_1dpdn6p_di\" bpmnElement=\"Participant_1dpdn6p\" isHorizontal=\"true\">\r\n        <dc:Bounds x=\"190\" y=\"40\" width=\"770\" height=\"310\" />\r\n      </bpmndi:BPMNShape>\r\n      <bpmndi:BPMNEdge id=\"Flow_032gd26_di\" bpmnElement=\"Flow_032gd26\">\r\n        <di:waypoint x=\"330\" y=\"255\" />\r\n        <di:waypoint x=\"330\" y=\"220\" />\r\n        <di:waypoint x=\"440\" y=\"220\" />\r\n        <di:waypoint x=\"440\" y=\"240\" />\r\n        <bpmndi:BPMNLabel>\r\n          <dc:Bounds x=\"368\" y=\"202\" width=\"35\" height=\"14\" />\r\n        </bpmndi:BPMNLabel>\r\n      </bpmndi:BPMNEdge>\r\n      <bpmndi:BPMNEdge id=\"Flow_0kfbf9s_di\" bpmnElement=\"Flow_0kfbf9s\">\r\n        <di:waypoint x=\"305\" y=\"280\" />\r\n        <di:waypoint x=\"268\" y=\"280\" />\r\n        <bpmndi:BPMNLabel>\r\n          <dc:Bounds x=\"279\" y=\"262\" width=\"15\" height=\"14\" />\r\n        </bpmndi:BPMNLabel>\r\n      </bpmndi:BPMNEdge>\r\n      <bpmndi:BPMNEdge id=\"Flow_0vd0efi_di\" bpmnElement=\"Flow_0vd0efi\">\r\n        <di:waypoint x=\"390\" y=\"280\" />\r\n        <di:waypoint x=\"355\" y=\"280\" />\r\n      </bpmndi:BPMNEdge>\r\n      <bpmndi:BPMNEdge id=\"Flow_1lwp680_di\" bpmnElement=\"Flow_1lwp680\">\r\n        <di:waypoint x=\"515\" y=\"280\" />\r\n        <di:waypoint x=\"490\" y=\"280\" />\r\n        <bpmndi:BPMNLabel>\r\n          <dc:Bounds x=\"495\" y=\"262\" width=\"15\" height=\"14\" />\r\n        </bpmndi:BPMNLabel>\r\n      </bpmndi:BPMNEdge>\r\n      <bpmndi:BPMNEdge id=\"Flow_0mz8g4i_di\" bpmnElement=\"Flow_0mz8g4i\">\r\n        <di:waypoint x=\"580\" y=\"280\" />\r\n        <di:waypoint x=\"565\" y=\"280\" />\r\n      </bpmndi:BPMNEdge>\r\n      <bpmndi:BPMNEdge id=\"Flow_0lst3zv_di\" bpmnElement=\"Flow_0lst3zv\">\r\n        <di:waypoint x=\"540\" y=\"255\" />\r\n        <di:waypoint x=\"540\" y=\"200\" />\r\n        <di:waypoint x=\"600\" y=\"200\" />\r\n        <di:waypoint x=\"600\" y=\"240\" />\r\n        <bpmndi:BPMNLabel>\r\n          <dc:Bounds x=\"553\" y=\"203\" width=\"35\" height=\"14\" />\r\n        </bpmndi:BPMNLabel>\r\n      </bpmndi:BPMNEdge>\r\n      <bpmndi:BPMNEdge id=\"Flow_056edb0_di\" bpmnElement=\"Flow_056edb0\">\r\n        <di:waypoint x=\"715\" y=\"280\" />\r\n        <di:waypoint x=\"680\" y=\"280\" />\r\n        <bpmndi:BPMNLabel>\r\n          <dc:Bounds x=\"690\" y=\"262\" width=\"15\" height=\"14\" />\r\n        </bpmndi:BPMNLabel>\r\n      </bpmndi:BPMNEdge>\r\n      <bpmndi:BPMNEdge id=\"Flow_1v39yum_di\" bpmnElement=\"Flow_1v39yum\">\r\n        <di:waypoint x=\"830\" y=\"280\" />\r\n        <di:waypoint x=\"765\" y=\"280\" />\r\n      </bpmndi:BPMNEdge>\r\n      <bpmndi:BPMNEdge id=\"Flow_1qztjd5_di\" bpmnElement=\"Flow_1qztjd5\">\r\n        <di:waypoint x=\"740\" y=\"255\" />\r\n        <di:waypoint x=\"740\" y=\"200\" />\r\n        <di:waypoint x=\"840\" y=\"200\" />\r\n        <di:waypoint x=\"840\" y=\"240\" />\r\n        <bpmndi:BPMNLabel>\r\n          <dc:Bounds x=\"773\" y=\"203\" width=\"35\" height=\"14\" />\r\n        </bpmndi:BPMNLabel>\r\n      </bpmndi:BPMNEdge>\r\n      <bpmndi:BPMNEdge id=\"Flow_0bacyby_di\" bpmnElement=\"Flow_0bacyby\">\r\n        <di:waypoint x=\"855\" y=\"150\" />\r\n        <di:waypoint x=\"880\" y=\"150\" />\r\n        <di:waypoint x=\"880\" y=\"240\" />\r\n        <bpmndi:BPMNLabel>\r\n          <dc:Bounds x=\"892\" y=\"203\" width=\"15\" height=\"14\" />\r\n        </bpmndi:BPMNLabel>\r\n      </bpmndi:BPMNEdge>\r\n      <bpmndi:BPMNEdge id=\"Flow_1yadp7s_di\" bpmnElement=\"Flow_1yadp7s\">\r\n        <di:waypoint x=\"565\" y=\"150\" />\r\n        <di:waypoint x=\"640\" y=\"150\" />\r\n        <bpmndi:BPMNLabel>\r\n          <dc:Bounds x=\"595\" y=\"132\" width=\"15\" height=\"14\" />\r\n        </bpmndi:BPMNLabel>\r\n      </bpmndi:BPMNEdge>\r\n      <bpmndi:BPMNEdge id=\"Flow_14xplzk_di\" bpmnElement=\"Flow_14xplzk\">\r\n        <di:waypoint x=\"740\" y=\"150\" />\r\n        <di:waypoint x=\"805\" y=\"150\" />\r\n      </bpmndi:BPMNEdge>\r\n      <bpmndi:BPMNEdge id=\"Flow_1r5ghn4_di\" bpmnElement=\"Flow_1r5ghn4\">\r\n        <di:waypoint x=\"830\" y=\"125\" />\r\n        <di:waypoint x=\"830\" y=\"50\" />\r\n        <di:waypoint x=\"690\" y=\"50\" />\r\n        <di:waypoint x=\"690\" y=\"110\" />\r\n        <bpmndi:BPMNLabel>\r\n          <dc:Bounds x=\"743\" y=\"53\" width=\"35\" height=\"14\" />\r\n        </bpmndi:BPMNLabel>\r\n      </bpmndi:BPMNEdge>\r\n      <bpmndi:BPMNEdge id=\"Flow_1x1en9f_di\" bpmnElement=\"Flow_1x1en9f\">\r\n        <di:waypoint x=\"540\" y=\"125\" />\r\n        <di:waypoint x=\"540\" y=\"50\" />\r\n        <di:waypoint x=\"390\" y=\"50\" />\r\n        <di:waypoint x=\"390\" y=\"110\" />\r\n        <bpmndi:BPMNLabel>\r\n          <dc:Bounds x=\"448\" y=\"53\" width=\"35\" height=\"14\" />\r\n        </bpmndi:BPMNLabel>\r\n      </bpmndi:BPMNEdge>\r\n      <bpmndi:BPMNEdge id=\"Flow_0jlqzbv_di\" bpmnElement=\"Flow_0jlqzbv\">\r\n        <di:waypoint x=\"440\" y=\"150\" />\r\n        <di:waypoint x=\"515\" y=\"150\" />\r\n      </bpmndi:BPMNEdge>\r\n      <bpmndi:BPMNEdge id=\"Flow_0ufuik6_di\" bpmnElement=\"Flow_0ufuik6\">\r\n        <di:waypoint x=\"278\" y=\"150\" />\r\n        <di:waypoint x=\"340\" y=\"150\" />\r\n      </bpmndi:BPMNEdge>\r\n      <bpmndi:BPMNShape id=\"Event_00ivwir_di\" bpmnElement=\"Event_00ivwir\">\r\n        <dc:Bounds x=\"242\" y=\"132\" width=\"36\" height=\"36\" />\r\n      </bpmndi:BPMNShape>\r\n      <bpmndi:BPMNShape id=\"Activity_0b44uyr_di\" bpmnElement=\"Activity_0b44uyr\">\r\n        <dc:Bounds x=\"340\" y=\"110\" width=\"100\" height=\"80\" />\r\n      </bpmndi:BPMNShape>\r\n      <bpmndi:BPMNShape id=\"Gateway_0a2g599_di\" bpmnElement=\"Gateway_0a2g599\" isMarkerVisible=\"true\">\r\n        <dc:Bounds x=\"515\" y=\"125\" width=\"50\" height=\"50\" />\r\n        <bpmndi:BPMNLabel>\r\n          <dc:Bounds x=\"524\" y=\"173\" width=\"32\" height=\"14\" />\r\n        </bpmndi:BPMNLabel>\r\n      </bpmndi:BPMNShape>\r\n      <bpmndi:BPMNShape id=\"Gateway_190p5r1_di\" bpmnElement=\"Gateway_190p5r1\" isMarkerVisible=\"true\">\r\n        <dc:Bounds x=\"805\" y=\"125\" width=\"50\" height=\"50\" />\r\n        <bpmndi:BPMNLabel>\r\n          <dc:Bounds x=\"844\" y=\"163\" width=\"32\" height=\"14\" />\r\n        </bpmndi:BPMNLabel>\r\n      </bpmndi:BPMNShape>\r\n      <bpmndi:BPMNShape id=\"Activity_12pbov6_di\" bpmnElement=\"Activity_12pbov6\">\r\n        <dc:Bounds x=\"640\" y=\"110\" width=\"100\" height=\"80\" />\r\n      </bpmndi:BPMNShape>\r\n      <bpmndi:BPMNShape id=\"Activity_18wcxg1_di\" bpmnElement=\"Activity_18wcxg1\">\r\n        <dc:Bounds x=\"830\" y=\"240\" width=\"100\" height=\"80\" />\r\n      </bpmndi:BPMNShape>\r\n      <bpmndi:BPMNShape id=\"Gateway_1ssqwu7_di\" bpmnElement=\"Gateway_1ssqwu7\" isMarkerVisible=\"true\">\r\n        <dc:Bounds x=\"715\" y=\"255\" width=\"50\" height=\"50\" />\r\n        <bpmndi:BPMNLabel>\r\n          <dc:Bounds x=\"724\" y=\"312\" width=\"32\" height=\"14\" />\r\n        </bpmndi:BPMNLabel>\r\n      </bpmndi:BPMNShape>\r\n      <bpmndi:BPMNShape id=\"Activity_1avb052_di\" bpmnElement=\"Activity_1avb052\">\r\n        <dc:Bounds x=\"580\" y=\"240\" width=\"100\" height=\"80\" />\r\n      </bpmndi:BPMNShape>\r\n      <bpmndi:BPMNShape id=\"Gateway_0balowq_di\" bpmnElement=\"Gateway_0balowq\" isMarkerVisible=\"true\">\r\n        <dc:Bounds x=\"515\" y=\"255\" width=\"50\" height=\"50\" />\r\n        <bpmndi:BPMNLabel>\r\n          <dc:Bounds x=\"524\" y=\"312\" width=\"32\" height=\"14\" />\r\n        </bpmndi:BPMNLabel>\r\n      </bpmndi:BPMNShape>\r\n      <bpmndi:BPMNShape id=\"Activity_03qxj4x_di\" bpmnElement=\"Activity_03qxj4x\">\r\n        <dc:Bounds x=\"390\" y=\"240\" width=\"100\" height=\"80\" />\r\n      </bpmndi:BPMNShape>\r\n      <bpmndi:BPMNShape id=\"Event_0wmrvj1_di\" bpmnElement=\"Event_0wmrvj1\">\r\n        <dc:Bounds x=\"232\" y=\"262\" width=\"36\" height=\"36\" />\r\n      </bpmndi:BPMNShape>\r\n      <bpmndi:BPMNShape id=\"Gateway_1p20o9b_di\" bpmnElement=\"Gateway_1p20o9b\" isMarkerVisible=\"true\">\r\n        <dc:Bounds x=\"305\" y=\"255\" width=\"50\" height=\"50\" />\r\n        <bpmndi:BPMNLabel>\r\n          <dc:Bounds x=\"314\" y=\"312\" width=\"32\" height=\"14\" />\r\n        </bpmndi:BPMNLabel>\r\n      </bpmndi:BPMNShape>\r\n    </bpmndi:BPMNPlane>\r\n  </bpmndi:BPMNDiagram>\r\n</bpmn:definitions>\r\n\''),
(11, '2020-05-24 15:20:19', '2020-05-24 15:20:49', 'Scoping 2', 'created', 6, 's', '\'<?xml version=\"1.0\" encoding=\"UTF-8\"?>\r\n<bpmn:definitions xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:bpmn=\"http://www.omg.org/spec/BPMN/20100524/MODEL\" xmlns:bpmndi=\"http://www.omg.org/spec/BPMN/20100524/DI\" xmlns:dc=\"http://www.omg.org/spec/DD/20100524/DC\" xmlns:di=\"http://www.omg.org/spec/DD/20100524/DI\" id=\"Definitions_014zzan\" targetNamespace=\"http://bpmn.io/schema/bpmn\" exporter=\"bpmn-js (https://demo.bpmn.io)\" exporterVersion=\"6.5.1\">\r\n  <bpmn:collaboration id=\"Collaboration_0msf5rh\">\r\n    <bpmn:participant id=\"Participant_1dpdn6p\" name=\"Generic Scoping Process\" processRef=\"Process_0nqp456\" />\r\n  </bpmn:collaboration>\r\n  <bpmn:process id=\"Process_0nqp456\" isExecutable=\"false\">\r\n    <bpmn:startEvent id=\"Event_00ivwir\">\r\n      <bpmn:outgoing>Flow_0ufuik6</bpmn:outgoing>\r\n    </bpmn:startEvent>\r\n    <bpmn:task id=\"Activity_0b44uyr\" name=\"Pre-Scoping\">\r\n      <bpmn:incoming>Flow_0ufuik6</bpmn:incoming>\r\n      <bpmn:outgoing>Flow_0jlqzbv</bpmn:outgoing>\r\n    </bpmn:task>\r\n    <bpmn:inclusiveGateway id=\"Gateway_0a2g599\">\r\n      <bpmn:incoming>Flow_0jlqzbv</bpmn:incoming>\r\n      <bpmn:outgoing>Flow_0m75xu5</bpmn:outgoing>\r\n      <bpmn:outgoing>Flow_0ykmxxp</bpmn:outgoing>\r\n    </bpmn:inclusiveGateway>\r\n    <bpmn:inclusiveGateway id=\"Gateway_190p5r1\">\r\n      <bpmn:incoming>Flow_046vew3</bpmn:incoming>\r\n      <bpmn:incoming>Flow_06bnwyz</bpmn:incoming>\r\n      <bpmn:outgoing>Flow_1jbyuhf</bpmn:outgoing>\r\n    </bpmn:inclusiveGateway>\r\n    <bpmn:task id=\"Activity_0k6qsjk\" name=\"Scoping Closure\">\r\n      <bpmn:incoming>Flow_1jbyuhf</bpmn:incoming>\r\n      <bpmn:outgoing>Flow_1vot7x3</bpmn:outgoing>\r\n    </bpmn:task>\r\n    <bpmn:task id=\"Activity_0jajyfo\" name=\"Domain Scoping\">\r\n      <bpmn:incoming>Flow_0m75xu5</bpmn:incoming>\r\n      <bpmn:outgoing>Flow_06bnwyz</bpmn:outgoing>\r\n    </bpmn:task>\r\n    <bpmn:task id=\"Activity_0u9knnc\" name=\"Asset Scoping\">\r\n      <bpmn:incoming>Flow_0ykmxxp</bpmn:incoming>\r\n      <bpmn:outgoing>Flow_046vew3</bpmn:outgoing>\r\n    </bpmn:task>\r\n    <bpmn:endEvent id=\"Event_0wmrvj1\">\r\n      <bpmn:incoming>Flow_1vot7x3</bpmn:incoming>\r\n    </bpmn:endEvent>\r\n    <bpmn:sequenceFlow id=\"Flow_0jlqzbv\" sourceRef=\"Activity_0b44uyr\" targetRef=\"Gateway_0a2g599\" />\r\n    <bpmn:sequenceFlow id=\"Flow_0ufuik6\" sourceRef=\"Event_00ivwir\" targetRef=\"Activity_0b44uyr\" />\r\n    <bpmn:sequenceFlow id=\"Flow_1jbyuhf\" sourceRef=\"Gateway_190p5r1\" targetRef=\"Activity_0k6qsjk\" />\r\n    <bpmn:sequenceFlow id=\"Flow_1vot7x3\" sourceRef=\"Activity_0k6qsjk\" targetRef=\"Event_0wmrvj1\" />\r\n    <bpmn:sequenceFlow id=\"Flow_0m75xu5\" sourceRef=\"Gateway_0a2g599\" targetRef=\"Activity_0jajyfo\" />\r\n    <bpmn:sequenceFlow id=\"Flow_0ykmxxp\" sourceRef=\"Gateway_0a2g599\" targetRef=\"Activity_0u9knnc\" />\r\n    <bpmn:sequenceFlow id=\"Flow_046vew3\" sourceRef=\"Activity_0u9knnc\" targetRef=\"Gateway_190p5r1\" />\r\n    <bpmn:sequenceFlow id=\"Flow_06bnwyz\" sourceRef=\"Activity_0jajyfo\" targetRef=\"Gateway_190p5r1\" />\r\n  </bpmn:process>\r\n  <bpmndi:BPMNDiagram id=\"BPMNDiagram_1\">\r\n    <bpmndi:BPMNPlane id=\"BPMNPlane_1\" bpmnElement=\"Collaboration_0msf5rh\">\r\n      <bpmndi:BPMNShape id=\"Participant_1dpdn6p_di\" bpmnElement=\"Participant_1dpdn6p\" isHorizontal=\"true\">\r\n        <dc:Bounds x=\"180\" y=\"-10\" width=\"820\" height=\"300\" />\r\n      </bpmndi:BPMNShape>\r\n      <bpmndi:BPMNEdge id=\"Flow_06bnwyz_di\" bpmnElement=\"Flow_06bnwyz\">\r\n        <di:waypoint x=\"660\" y=\"50\" />\r\n        <di:waypoint x=\"740\" y=\"50\" />\r\n        <di:waypoint x=\"740\" y=\"115\" />\r\n      </bpmndi:BPMNEdge>\r\n      <bpmndi:BPMNEdge id=\"Flow_046vew3_di\" bpmnElement=\"Flow_046vew3\">\r\n        <di:waypoint x=\"660\" y=\"230\" />\r\n        <di:waypoint x=\"740\" y=\"230\" />\r\n        <di:waypoint x=\"740\" y=\"165\" />\r\n      </bpmndi:BPMNEdge>\r\n      <bpmndi:BPMNEdge id=\"Flow_0ykmxxp_di\" bpmnElement=\"Flow_0ykmxxp\">\r\n        <di:waypoint x=\"490\" y=\"165\" />\r\n        <di:waypoint x=\"490\" y=\"230\" />\r\n        <di:waypoint x=\"560\" y=\"230\" />\r\n      </bpmndi:BPMNEdge>\r\n      <bpmndi:BPMNEdge id=\"Flow_0m75xu5_di\" bpmnElement=\"Flow_0m75xu5\">\r\n        <di:waypoint x=\"490\" y=\"115\" />\r\n        <di:waypoint x=\"490\" y=\"50\" />\r\n        <di:waypoint x=\"560\" y=\"50\" />\r\n      </bpmndi:BPMNEdge>\r\n      <bpmndi:BPMNEdge id=\"Flow_1vot7x3_di\" bpmnElement=\"Flow_1vot7x3\">\r\n        <di:waypoint x=\"910\" y=\"140\" />\r\n        <di:waypoint x=\"942\" y=\"140\" />\r\n      </bpmndi:BPMNEdge>\r\n      <bpmndi:BPMNEdge id=\"Flow_1jbyuhf_di\" bpmnElement=\"Flow_1jbyuhf\">\r\n        <di:waypoint x=\"765\" y=\"140\" />\r\n        <di:waypoint x=\"810\" y=\"140\" />\r\n      </bpmndi:BPMNEdge>\r\n      <bpmndi:BPMNEdge id=\"Flow_0ufuik6_di\" bpmnElement=\"Flow_0ufuik6\">\r\n        <di:waypoint x=\"268\" y=\"140\" />\r\n        <di:waypoint x=\"330\" y=\"140\" />\r\n      </bpmndi:BPMNEdge>\r\n      <bpmndi:BPMNEdge id=\"Flow_0jlqzbv_di\" bpmnElement=\"Flow_0jlqzbv\">\r\n        <di:waypoint x=\"430\" y=\"140\" />\r\n        <di:waypoint x=\"465\" y=\"140\" />\r\n      </bpmndi:BPMNEdge>\r\n      <bpmndi:BPMNShape id=\"Event_00ivwir_di\" bpmnElement=\"Event_00ivwir\">\r\n        <dc:Bounds x=\"232\" y=\"122\" width=\"36\" height=\"36\" />\r\n      </bpmndi:BPMNShape>\r\n      <bpmndi:BPMNShape id=\"Activity_0b44uyr_di\" bpmnElement=\"Activity_0b44uyr\">\r\n        <dc:Bounds x=\"330\" y=\"100\" width=\"100\" height=\"80\" />\r\n      </bpmndi:BPMNShape>\r\n      <bpmndi:BPMNShape id=\"Gateway_1kut6rf_di\" bpmnElement=\"Gateway_0a2g599\">\r\n        <dc:Bounds x=\"465\" y=\"115\" width=\"50\" height=\"50\" />\r\n        <bpmndi:BPMNLabel>\r\n          <dc:Bounds x=\"474\" y=\"182\" width=\"32\" height=\"14\" />\r\n        </bpmndi:BPMNLabel>\r\n      </bpmndi:BPMNShape>\r\n      <bpmndi:BPMNShape id=\"Gateway_15h81z8_di\" bpmnElement=\"Gateway_190p5r1\">\r\n        <dc:Bounds x=\"715\" y=\"115\" width=\"50\" height=\"50\" />\r\n        <bpmndi:BPMNLabel>\r\n          <dc:Bounds x=\"754\" y=\"163\" width=\"32\" height=\"14\" />\r\n        </bpmndi:BPMNLabel>\r\n      </bpmndi:BPMNShape>\r\n      <bpmndi:BPMNShape id=\"Activity_0k6qsjk_di\" bpmnElement=\"Activity_0k6qsjk\">\r\n        <dc:Bounds x=\"810\" y=\"100\" width=\"100\" height=\"80\" />\r\n      </bpmndi:BPMNShape>\r\n      <bpmndi:BPMNShape id=\"Activity_0jajyfo_di\" bpmnElement=\"Activity_0jajyfo\">\r\n        <dc:Bounds x=\"560\" y=\"10\" width=\"100\" height=\"80\" />\r\n      </bpmndi:BPMNShape>\r\n      <bpmndi:BPMNShape id=\"Activity_0u9knnc_di\" bpmnElement=\"Activity_0u9knnc\">\r\n        <dc:Bounds x=\"560\" y=\"190\" width=\"100\" height=\"80\" />\r\n      </bpmndi:BPMNShape>\r\n      <bpmndi:BPMNShape id=\"Event_0wmrvj1_di\" bpmnElement=\"Event_0wmrvj1\">\r\n        <dc:Bounds x=\"942\" y=\"122\" width=\"36\" height=\"36\" />\r\n      </bpmndi:BPMNShape>\r\n    </bpmndi:BPMNPlane>\r\n  </bpmndi:BPMNDiagram>\r\n</bpmn:definitions>\r\n\'');

-- --------------------------------------------------------

--
-- Estrutura da tabela `experiences`
--

CREATE TABLE `experiences` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `time` int(11) NOT NULL,
  `difficulty` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `obs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assemble_process_id` int(10) UNSIGNED NOT NULL,
  `activity_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `experiences`
--

INSERT INTO `experiences` (`id`, `created_at`, `updated_at`, `time`, `difficulty`, `obs`, `assemble_process_id`, `activity_id`) VALUES
(5, '2020-06-06 21:33:29', '2020-06-06 21:38:16', 13, '13', '13', 1, 2),
(8, '2020-06-06 21:40:22', '2020-06-06 21:40:22', 2, '22', '2', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `features`
--

CREATE TABLE `features` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `abstract` tinyint(1) NOT NULL DEFAULT 0,
  `feature_model_id` int(10) UNSIGNED NOT NULL,
  `parent` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `features`
--

INSERT INTO `features` (`id`, `created_at`, `updated_at`, `name`, `type`, `height`, `description`, `abstract`, `feature_model_id`, `parent`) VALUES
(2, '2020-06-04 23:33:16', '2020-06-04 23:33:25', 'SPL1', 'Mandatory', 0, 'SPL core.', 1, 2, NULL),
(4, '2020-06-05 00:34:35', '2020-06-06 19:23:51', 'essaqe', 'OR Alternative', 2, 'fee', 0, 2, 10),
(10, '2020-06-05 01:04:32', '2020-06-05 01:04:38', 'fe', 'Optional', 1, 'fe', 1, 2, 2),
(11, '2020-06-08 00:13:32', '2020-06-08 01:29:34', 'f5', 'Mandatory', 1, 'f', 0, 2, 2),
(12, '2020-06-08 00:14:38', '2020-06-08 01:35:47', 'f55', 'Mandatory', 4, '3', 1, 2, 13),
(13, '2020-06-08 00:14:45', '2020-06-08 01:29:22', 'f2', 'XOR Alternative', 3, '3', 0, 2, 4),
(14, '2020-06-08 00:14:57', '2020-06-08 01:29:28', 'f3', 'Mandatory', 2, '5', 0, 2, 10),
(15, '2020-06-11 00:00:17', '2020-06-11 00:00:17', 'Text Editing System', 'Mandatory', 0, 'SPL core.', 1, 3, NULL),
(16, '2020-06-11 00:00:47', '2020-06-11 00:00:47', 'File Management', 'Mandatory', 1, 'Management  of files', 1, 3, 15),
(17, '2020-06-11 00:01:07', '2020-06-11 00:01:07', 'Help', 'Mandatory', 1, 'Help component', 0, 3, 15),
(18, '2020-06-11 00:01:27', '2020-06-11 00:01:27', 'Change Display Settings', 'Mandatory', 1, 'Settings of the display', 1, 3, 15),
(19, '2020-06-11 00:01:45', '2020-06-11 00:01:45', 'Basic', 'Mandatory', 2, 'Basic file manager', 0, 3, 16),
(20, '2020-06-11 00:02:02', '2020-06-11 00:02:02', 'Edit', 'Mandatory', 2, 'Edit options', 1, 3, 16),
(21, '2020-06-11 00:02:24', '2020-06-11 00:02:24', 'Resize', 'Optional', 2, 'resize options', 0, 3, 18),
(23, '2020-06-11 00:03:03', '2020-06-11 00:03:03', 'Font Color', 'Mandatory', 2, 'change the font color', 1, 3, 18),
(24, '2020-06-11 00:03:22', '2020-06-11 00:03:22', 'Black', 'XOR Alternative', 3, 'black color', 0, 3, 23),
(25, '2020-06-11 00:03:35', '2020-06-11 00:03:35', 'Red', 'XOR Alternative', 3, 'red color', 0, 3, 23),
(26, '2020-06-11 00:03:51', '2020-06-11 00:03:51', 'Case conversion', 'Mandatory', 2, 'convert cases', 1, 3, 18),
(27, '2020-06-11 00:04:08', '2020-06-11 00:04:08', 'Upper Case', 'OR Alternative', 3, 'to upper case', 0, 3, 26),
(28, '2020-06-11 00:04:20', '2020-06-11 00:04:20', 'Lower case', 'OR Alternative', 3, 'to lower case', 0, 3, 26),
(29, '2020-06-11 00:04:48', '2020-06-11 00:04:48', 'Search', 'Optional', 2, 'search function', 0, 3, 16),
(30, '2020-06-11 00:05:03', '2020-06-11 00:05:03', 'Replacement', 'Optional', 2, 'Replacement function', 0, 3, 16),
(31, '2020-06-11 00:05:23', '2020-06-11 00:05:23', 'Copy', 'Mandatory', 3, 'copy fnt', 0, 3, 20),
(32, '2020-06-11 00:05:36', '2020-06-11 00:05:48', 'Select All', 'Optional', 3, 'select all fnt', 0, 3, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `feature_artifacts`
--

CREATE TABLE `feature_artifacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `feature_id` int(10) UNSIGNED NOT NULL,
  `artifact_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `feature_artifacts`
--

INSERT INTO `feature_artifacts` (`id`, `created_at`, `updated_at`, `feature_id`, `artifact_id`) VALUES
(1, '2020-06-06 19:48:44', '2020-06-06 19:48:44', 4, 15),
(2, '2020-06-11 00:06:58', '2020-06-11 00:06:58', 31, 20),
(3, '2020-06-11 00:07:08', '2020-06-11 00:07:08', 32, 23),
(4, '2020-06-11 00:07:23', '2020-06-11 00:07:23', 24, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `feature_models`
--

CREATE TABLE `feature_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `xml` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `feature_models`
--

INSERT INTO `feature_models` (`id`, `created_at`, `updated_at`, `name`, `xml`, `project_id`) VALUES
(2, '2020-06-04 23:33:16', '2020-06-04 23:33:25', 'SPL1', '\'<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"no\"?>\n        <featureModel chosenLayoutAlgorithm=\"1\">\n            <struct>\n                <and mandatory=\"true\" name=\"Fm2\">\n                    <feature name=\"Feature1\"/>\n                    <feature name=\"Feature2\"/>  \n                </and>\n            </struct>\n            <constraints> \n            </constraints>\n            <comments/>\n            <featureOrder userDefined=\"false\"/>\n        </featureModel>\'', 1),
(3, '2020-06-11 00:00:17', '2020-06-11 00:00:17', 'Text Editing System', '\'<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"no\"?>\n        <featureModel chosenLayoutAlgorithm=\"1\">\n            <struct>\n                <and mandatory=\"true\" name=\"Text Editing System\">\n                    <feature name=\"Feature1\"/>\n                    <feature name=\"Feature2\"/>  \n                </and>\n            </struct>\n            <constraints> \n            </constraints>\n            <comments/>\n            <featureOrder userDefined=\"false\"/>\n        </featureModel>\'', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2019_08_19_000000_create_failed_jobs_table', 1),
(13, '2019_12_10_165004_create_projects_table', 2),
(15, '2019_12_20_203338_create_team_table', 3),
(16, '2019_12_20_203338_create_teams_table', 4),
(18, '2020_01_08_194244_create_teams_table', 5),
(19, '2020_01_17_201052_create_artifacts_table', 6),
(43, '2020_02_29_010627_create_techniques_table', 7),
(49, '2020_02_29_013708_create_related_techniques_table', 8),
(70, '2020_02_29_020235_create_technique_project_table', 9),
(71, '2020_03_07_184849_create_assemble_processes_table', 9),
(72, '2020_03_07_191145_create_activities_table', 9),
(73, '2020_03_07_191511_create_activities_inputs_table', 9),
(74, '2020_05_30_135030_create_feature_models_table', 10),
(75, '2020_05_30_135031_create_features_table', 10),
(76, '2020_05_30_135033_create_features_artifacts_table', 10),
(77, '2020_05_30_135033_create_feature_artifacts_table', 11),
(78, '2020_06_06_164248_create_experiences_table', 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `owner_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `created_at`, `updated_at`, `owner_id`) VALUES
(1, 'Text Editor SPL', 'A sample project for a text editor SPL.', '2020-01-08 22:44:01', '2020-04-03 00:39:30', 1),
(2, 'Fa', 'fa', '2020-01-16 00:18:42', '2020-01-16 00:18:42', 3),
(3, 't', 't', '2020-02-29 02:25:16', '2020-02-29 02:25:16', 1),
(4, 'g', 'g', '2020-02-29 03:05:14', '2020-02-29 03:05:14', 4),
(5, '5', '5', '2020-02-29 03:05:36', '2020-02-29 03:05:36', 4),
(6, 'Eyal-Salman203', 'Pilot evaluation of PAxSPL', '2020-05-24 10:48:29', '2020-05-24 10:48:29', 1),
(7, 'test', 'ts', '2020-06-11 00:29:54', '2020-06-11 00:30:27', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `related_techniques`
--

CREATE TABLE `related_techniques` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `related_from` int(10) UNSIGNED NOT NULL,
  `related_to` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `related_techniques`
--

INSERT INTO `related_techniques` (`id`, `created_at`, `updated_at`, `related_from`, `related_to`) VALUES
(1, NULL, NULL, 1, 4),
(2, NULL, NULL, 2, 4),
(3, NULL, NULL, 3, 1),
(4, NULL, NULL, 4, 1),
(5, NULL, NULL, 4, 5),
(6, NULL, NULL, 5, 1),
(7, NULL, NULL, 5, 4),
(8, NULL, NULL, 6, 1),
(9, NULL, NULL, 6, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spl_exp` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `retrieval_exp` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `obs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fca` tinyint(1) NOT NULL DEFAULT 0,
  `lsi` tinyint(1) NOT NULL DEFAULT 0,
  `vsm` tinyint(1) NOT NULL DEFAULT 0,
  `cluster` tinyint(1) NOT NULL DEFAULT 0,
  `data_flow` tinyint(1) NOT NULL DEFAULT 0,
  `dependency` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Incomplete',
  `retrieval_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Feature Retriever'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `teams`
--

INSERT INTO `teams` (`id`, `role`, `company_role`, `spl_exp`, `retrieval_exp`, `obs`, `fca`, `lsi`, `vsm`, `cluster`, `data_flow`, `dependency`, `created_at`, `updated_at`, `user_id`, `project_id`, `status`, `retrieval_role`) VALUES
(1, 'Admin', 'Developer', 'Has a few works published in the field.', 'Applied FCA a few years ago.', 'None to be made.', 1, 1, 1, 0, 1, 1, '2020-01-08 22:44:01', '2020-06-06 21:46:07', 1, 1, 'Complete', 'Feature Retriever'),
(3, 'Admin', 'Fa', 'FA', 'FA', 'AF', 0, 0, 1, 0, 0, 0, '2020-01-16 00:18:42', '2020-01-16 00:44:06', 3, 2, 'Complete', 'Architect'),
(4, 'Admin', 'fa', 'fa', 'fa', 'fa', 0, 1, 0, 0, 1, 0, '2020-01-16 00:18:56', '2020-01-16 00:44:24', 1, 2, 'Complete', 'Domain Engineer'),
(6, 'Admin', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, '2020-02-29 02:25:16', '2020-02-29 02:25:16', 1, 3, 'Incomplete', 'Feature Retriever'),
(7, 'Admin', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, '2020-02-29 03:05:14', '2020-02-29 03:05:14', 4, 4, 'Incomplete', 'Feature Retriever'),
(8, 'Admin', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, '2020-02-29 03:05:27', '2020-02-29 03:05:27', 1, 4, 'Incomplete', 'Feature Retriever'),
(9, 'Admin', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, '2020-02-29 03:05:36', '2020-02-29 03:05:36', 4, 5, 'Incomplete', 'Feature Retriever'),
(21, 'Admin', 'Software Engineer', 'Yes', 'None', NULL, 1, 0, 0, 0, 0, 0, '2020-05-24 10:48:29', '2020-05-24 10:49:00', 1, 6, 'Complete', 'Feature Retriever'),
(23, 'Admin', 'CEO', 'Only as CEO', 'CEO Experience', NULL, 0, 0, 0, 0, 1, 1, '2020-06-11 00:13:47', '2020-06-11 00:14:14', 5, 6, 'Complete', 'Feature Tester'),
(24, 'Admin', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, '2020-06-11 00:29:54', '2020-06-11 00:29:54', 1, 7, 'Incomplete', 'Feature Retriever');

-- --------------------------------------------------------

--
-- Estrutura da tabela `techniques`
--

CREATE TABLE `techniques` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inputs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `definition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `variations` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `recommended_situation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `not_recommended_situation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `techniques`
--

INSERT INTO `techniques` (`id`, `name`, `type`, `inputs`, `definition`, `priority_order`, `variations`, `recommended_situation`, `not_recommended_situation`, `created_at`, `updated_at`) VALUES
(1, 'Clustering', 'Static Analysis', 'Development', 'Group features based on their dependencies.', 'Group > Extraction > Categorize', 'Agglomerative Hierarchical Clustering, Divisive Hierarchical Clustering.', 'Clustering is highly recommended in products that possesses high level of dependencies between feature implementations. Besides that, a good documentation is not required when applying this technique.', 'As an static analysis technique, clustering may be unable to find all elements related to the same feature when applied in source code where the implementation of a feature is spread across several modules.', NULL, NULL),
(2, 'Dependency Analysis', 'Static Analysis', 'Development', 'Leverages static dependencies between program elements. Can be used to validate and describe the interdependence between elements.', 'Extraction > Categorize > Group', 'Data Dependency, Control Dependency, Structural Dependency', 'To perform Dependency Analysis is almost mandatory that the products have high level of dependencies between feature implementations. Besides that, a good documentation is not required when applying this technique.', 'As an static analysis technique, dependency analysis may be unable to find all elements related to the same feature when applied in source code where the implementation of a feature is spread across several modules.', NULL, NULL),
(3, 'Data Flow Analysis', 'Static Analysis', 'Development', 'Gather information about possible values calculated at different points of an software system. This information is used to determine in which parts of that program a particular value might propagate.', 'Extraction > Categorize > Group', 'Forward Analysis, Backward Analysis', 'To apply this technique in a satisfactory way, source code must be well written. Better results can be reached when source code possesses high level of dependencies between feature implementations. Besides that, a good documentation is not required when applying this technique.', 'Not recommended if the products source code does not have low coupling and high cohesion. Also, if the source code possesses a high variable flow data flow analysis may have uncertain results.', NULL, NULL),
(4, 'Formal Concept Analysis', 'Information Retrieval Techniques', 'Development; Requirements; Design; Domain', 'A mathematical method that provides a way to identify meaningful groupings of objects that have common attributes.', 'Extraction > Categorize > Group', 'Clarified, Reduced', 'Formal Concept Analysis is recommended when program elements (such as classes, methods, etc.) have meaningful names. Besides that, is highly recommended to use this technique in products well documented.', 'A Information Retrieval Technique cannot achieve quality results when applied to products with no documentation and no meaningful identifiers names. For that reason we don\'t recommend the use of Formal Concept Analysis or any other Information Retrieval Technique in those situations.', NULL, NULL),
(5, 'Latent Semantic Indexing', 'Information Retrieval Techniques', 'Development; Requirements', 'A mathematical method that provides a way to identify meaningful groupings of objects that have common attributes.', 'Extraction > Categorize > Group', 'Latent semantic analysis, Semantic hashing', 'Latent Semantic Indexing is recommended when program elements (such as classes, methods, etc.) have meaningful names. Besides that, is highly recommended to use this technique in products well documented.', 'A Information Retrieval Technique cannot achieve quality results when applied to products with no documentation and no meaningful identifiers names. For that reason we don\'t recommend the use of Latent Semantic Indexing or any other Information Retrieval Technique in those situations.', NULL, NULL),
(6, 'Vector Space Model', 'Information Retrieval Techniques', 'Development; Requirements; Design; Domain', 'An algebraic model for representing text documents in a way where the objects retrieved are modeled as elements of a vector space.', 'Extraction > Categorize > Group', '', 'Vector Space Model is recommended when program elements (such as classes, methods, etc.) have meaningful names. Besides that, is highly recommended to use this technique in products well documented.', 'A Information Retrieval Technique cannot achieve quality results when applied to products with no documentation and no meaningful identifiers names. For that reason we don\'t recommend the use of Vector Space Model (VSM) or any other Information Retrieval Technique in those situations.', NULL, NULL),
(7, 'Expert Driven', 'Support', 'Development; Requirements; Design; Domain', 'This strategy is based on knowledge and experiences of specialists, such as domain engineers, software engineers, stakeholders, etc. This may include the addition of techniques that are not in this process documentation.', 'Categorize > Group > Extraction', '', 'To apply the expert driven strategy is highly recommended to have a team with skills and knowledge involving the re-engineering process of SPL. We also recommend to use Expert Driven as a support strategy along Static Analysis and Information Retrieval.', '', NULL, NULL),
(8, 'Heuristics', 'Support', 'Development; Requirements; Design; Domain', 'A proposed approach that uses a practical method not guaranteed to be perfect, but sufficient to obtain immediate goals.', 'Categorize > Group > Extraction', '', 'Heuristics can be called supporting techniques, so they can be used in different situations but always along other techniques such as clustering and information retrieval techniques.', '', NULL, NULL),
(9, 'Rule Based', 'Support', 'Development; Requirements; Design; Domain', 'A set of rules is created to guide and help whoever is performing the feature extraction.', 'Categorize > Group > Extraction', '', 'Rule based techniques are usually created in a specific scenario. For that reason they can only be performed in similar scenarios.', '', NULL, NULL),
(10, 'Market Analysis', 'Domain', 'Domain', 'Analyze the market to obtain information about related products and to scale the size of the domain.', '', '', '', '', NULL, NULL),
(11, 'Cost-Benefit Analysis', 'Domain', 'Domain', 'This type of analysis is crucial when developing/migrating a SPL. \n            As complex as it may be, is important to use a set of Cost Models, as well as understand the Customer Needs.', '', 'Cost Models, Customer Needs, Mathematical Models, Algorithms.', '', '', NULL, NULL),
(12, 'Product RoadMap', 'Domain', 'Development; Requirements; Design; Domain', 'May be defined by several tasks: defining the common and variable features of the SPL, as well as prioritizing \n            them based on customer or market needs. Plan the schedule of development.', '', '', '', '', NULL, NULL),
(13, 'Prioritize Products', 'Asset', 'Requirements; Design; Domain', 'This kind of task is performed alongside the product roadmap, where the products of this roadmap receive \n            their priority in the development schedule. Based on that, assets will also be prioritized.', '', '', '', '', NULL, NULL),
(14, 'Architecture Definition', 'Asset', 'Requirements; Design;', 'The reference architecture (RA) is important in SPL development. \n            This architecture is defined is composed of the features that are relevant to the product core. \n            Non-functional features may also be present in the RA.', '', '', '', '', NULL, NULL),
(15, 'Variability Analysis', 'Asset', 'Requirements; Design; Domain', 'Defining the variation points in the SPL. This variability is performed by analyzing these variation\n             points in terms of variability type. Another important aspect is the dependency analysis among these variation points.', '', '', '', '', NULL, NULL),
(16, 'Candidate Analysis', 'Product', 'Requirements; Design; Domain', 'Analyze the possible products-to-be is important to determine if they are viable and if they will \n            satisfy customer and company needs. These candidates are part of the product roadmap, and may share their architecture \n            with others.', '', '', '', '', NULL, NULL),
(17, 'Feature Definition', 'Product', 'Requirements; Domain', 'Define the features that will or not be part of each product is mandatory for defining a product portfolio.', '', '', '', '', NULL, NULL),
(18, 'Metrics Definition', 'SupportS', 'Development; Requirements; Design; Domain', 'Define metrics for scoping. These metrics may measure costs, market, size of products and features among other important characteristics.', '', '', '', '', NULL, NULL),
(19, 'Scoping Meta-Model', 'SupportS', 'Requirements; Design; Domain', 'A scoping meta-model may be used for defining some scoping concepts such as requirements, tests, and project and risk management.', '', '', '', '', NULL, NULL),
(20, 'Evolution Planning', 'SupportS', 'Development; Requirements; Design; Domain', 'Plan the evolution of a SPL may be used to provide additional information and depth to any concept \n            within the scoping type. The evolution plan may consider environment evolution, market evolution and variability evolution.', '', '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `technique_projects`
--

CREATE TABLE `technique_projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `technique_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `technique_projects`
--

INSERT INTO `technique_projects` (`id`, `created_at`, `updated_at`, `reason`, `project_id`, `technique_id`) VALUES
(2, '2020-04-15 22:41:03', '2020-04-15 22:41:03', 'FA', 1, 5),
(4, '2020-04-17 23:43:44', '2020-04-17 23:43:44', 'Fa', 1, 4),
(5, '2020-05-24 10:53:32', '2020-05-24 10:53:32', 'Chosen as it was used in the original study', 6, 5),
(7, '2020-05-24 10:57:13', '2020-05-24 10:57:13', 'It was used in the original study', 6, 4),
(9, '2020-05-24 10:59:08', '2020-05-24 10:59:08', 'Used to derive code-topics', 6, 1),
(10, '2020-05-24 11:12:21', '2020-05-24 11:12:21', 'Set of rules for traceability', 6, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Luciano', 'lamp67@hotmail.com', NULL, '$2y$10$EAepJvAJetJbtbhZxrbfW.iZdhAwiXCeFP86inFVKOUA0G8/eoIky', NULL, '2019-12-19 23:58:53', '2019-12-19 23:58:53'),
(2, 'Pedro', 'pedro@gmail.com', NULL, '$2y$10$pQQJgqIqcB5kpX99seqcKOUPB2lWuph8I1.n3ow8nOicg5KM1fPPm', NULL, '2020-01-06 23:37:01', '2020-01-06 23:37:01'),
(3, 'Tetra', 'jao@gmail.com', NULL, '$2y$10$W8nTIab/xqC0RyyfUD5KxO.x.ng2A4DkkHzZJFIXyiRiDOr80fwwK', NULL, '2020-01-16 00:18:33', '2020-01-16 00:18:33'),
(4, 'lu', 'lu@gmail.com', NULL, '$2y$10$hPy7JRsXOFXITJcv9KQBLe4sH2jtl4ABdB2YBrvpBt2FQPNfp9MDi', NULL, '2020-02-29 02:25:51', '2020-02-29 02:25:51'),
(5, 'Luciano 2', 'augustus.marchezan@gmail.com', NULL, '$2y$10$RZOXnwaifCQNej6RLIppRuHTmxoTogdViwXRKF8YNxsOzLYdYBhCy', NULL, '2020-06-11 00:13:34', '2020-06-11 00:13:34');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activities_assemble_process_id_foreign` (`assemble_process_id`),
  ADD KEY `activities_technique_id_foreign` (`technique_id`),
  ADD KEY `activities_experience_id_foreign` (`experience_id`) USING BTREE;

--
-- Índices para tabela `activities_artifacts`
--
ALTER TABLE `activities_artifacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activities_artifacts_activity_id_foreign` (`activity_id`),
  ADD KEY `activities_artifacts_artifact_id_foreign` (`artifact_id`);

--
-- Índices para tabela `artifacts`
--
ALTER TABLE `artifacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artifacts_project_id_foreign` (`project_id`),
  ADD KEY `artifacts_owner_id_foreign` (`owner_id`),
  ADD KEY `artifacts_last_update_user_foreign` (`last_update_user`);

--
-- Índices para tabela `assemble_processes`
--
ALTER TABLE `assemble_processes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assemble_processes_project_id_foreign` (`project_id`);

--
-- Índices para tabela `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `experiences_assemble_process_id_foreign` (`assemble_process_id`),
  ADD KEY `experiences_activity_id_foreign` (`activity_id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `features_fm_id_foreign` (`feature_model_id`),
  ADD KEY `features_parent_foreign` (`parent`);

--
-- Índices para tabela `feature_artifacts`
--
ALTER TABLE `feature_artifacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feature_artifacts_feature_id_foreign` (`feature_id`),
  ADD KEY `feature_artifacts_artifact_id_foreign` (`artifact_id`);

--
-- Índices para tabela `feature_models`
--
ALTER TABLE `feature_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feature_models_project_id_foreign` (`project_id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_owner_id_foreign` (`owner_id`);

--
-- Índices para tabela `related_techniques`
--
ALTER TABLE `related_techniques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `related_techniques_related_from_foreign` (`related_from`),
  ADD KEY `related_techniques_related_to_foreign` (`related_to`);

--
-- Índices para tabela `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_foreign` (`user_id`),
  ADD KEY `teams_project_id_foreign` (`project_id`);

--
-- Índices para tabela `techniques`
--
ALTER TABLE `techniques`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `technique_projects`
--
ALTER TABLE `technique_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `technique_projects_project_id_foreign` (`project_id`),
  ADD KEY `technique_projects_technique_id_foreign` (`technique_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `activities_artifacts`
--
ALTER TABLE `activities_artifacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `artifacts`
--
ALTER TABLE `artifacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `assemble_processes`
--
ALTER TABLE `assemble_processes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `features`
--
ALTER TABLE `features`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `feature_artifacts`
--
ALTER TABLE `feature_artifacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `feature_models`
--
ALTER TABLE `feature_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de tabela `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `related_techniques`
--
ALTER TABLE `related_techniques`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `techniques`
--
ALTER TABLE `techniques`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `technique_projects`
--
ALTER TABLE `technique_projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_assemble_process_id_foreign` FOREIGN KEY (`assemble_process_id`) REFERENCES `assemble_processes` (`id`),
  ADD CONSTRAINT `activities_technique_id_foreign` FOREIGN KEY (`technique_id`) REFERENCES `techniques` (`id`);

--
-- Limitadores para a tabela `activities_artifacts`
--
ALTER TABLE `activities_artifacts`
  ADD CONSTRAINT `activities_artifacts_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`),
  ADD CONSTRAINT `activities_artifacts_artifact_id_foreign` FOREIGN KEY (`artifact_id`) REFERENCES `artifacts` (`id`);

--
-- Limitadores para a tabela `artifacts`
--
ALTER TABLE `artifacts`
  ADD CONSTRAINT `artifacts_last_update_user_foreign` FOREIGN KEY (`last_update_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `artifacts_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `artifacts_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Limitadores para a tabela `assemble_processes`
--
ALTER TABLE `assemble_processes`
  ADD CONSTRAINT `assemble_processes_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Limitadores para a tabela `experiences`
--
ALTER TABLE `experiences`
  ADD CONSTRAINT `experiences_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`),
  ADD CONSTRAINT `experiences_assemble_process_id_foreign` FOREIGN KEY (`assemble_process_id`) REFERENCES `assemble_processes` (`id`);

--
-- Limitadores para a tabela `features`
--
ALTER TABLE `features`
  ADD CONSTRAINT `features_fm_id_foreign` FOREIGN KEY (`feature_model_id`) REFERENCES `feature_models` (`id`),
  ADD CONSTRAINT `features_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `features` (`id`);

--
-- Limitadores para a tabela `feature_artifacts`
--
ALTER TABLE `feature_artifacts`
  ADD CONSTRAINT `feature_artifacts_artifact_id_foreign` FOREIGN KEY (`artifact_id`) REFERENCES `artifacts` (`id`),
  ADD CONSTRAINT `feature_artifacts_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`);

--
-- Limitadores para a tabela `feature_models`
--
ALTER TABLE `feature_models`
  ADD CONSTRAINT `feature_models_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Limitadores para a tabela `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `related_techniques`
--
ALTER TABLE `related_techniques`
  ADD CONSTRAINT `related_techniques_related_from_foreign` FOREIGN KEY (`related_from`) REFERENCES `techniques` (`id`),
  ADD CONSTRAINT `related_techniques_related_to_foreign` FOREIGN KEY (`related_to`) REFERENCES `techniques` (`id`);

--
-- Limitadores para a tabela `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `teams_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `technique_projects`
--
ALTER TABLE `technique_projects`
  ADD CONSTRAINT `technique_projects_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `technique_projects_technique_id_foreign` FOREIGN KEY (`technique_id`) REFERENCES `techniques` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
