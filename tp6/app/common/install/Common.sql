-- ----------------------------
-- 计划任务
-- ----------------------------
CREATE TABLE `cms_tp6_cron` (
  `cron_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '计划任务ID',
  `type` tinyint(2) DEFAULT '0' COMMENT '计划任务类型',
  `subject` varchar(50) NOT NULL DEFAULT '' COMMENT '计划任务名称',
  `loop_type` varchar(10) NOT NULL DEFAULT '' COMMENT '循环类型month/week/day/hour/now',
  `loop_daytime` varchar(50) NOT NULL DEFAULT '' COMMENT '循环类型时间（日-时-分）',
  `cron_file` varchar(512) NOT NULL DEFAULT '' COMMENT '计划任务执行文件',
  `isopen` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否开启 0 否，1是，2系统任务',
  `created_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '计划任务创建时间',
  `modified_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '计划任务上次执行结束时间',
  `next_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '下一次执行时间',
  `data` text COMMENT '数据',
  PRIMARY KEY (`cron_id`),
  KEY `idx_next_time` (`next_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='计划任务表';

CREATE TABLE `cms_tp6_cron_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cron_id` int(11) NOT NULL COMMENT '计划任务ID',
  `start_time` int(11) NOT NULL COMMENT '开始时间',
  `end_time` int(11) NOT NULL COMMENT '结束时间',
  `result` tinyint(2) NOT NULL DEFAULT '1' COMMENT '执行结果：0待执行 1正常 2异常 3执行中',
  `use_time` int(11) NOT NULL DEFAULT '0' COMMENT '耗时',
  `result_msg` text COMMENT '执行日志信息',
  PRIMARY KEY (`id`),
  KEY `result` (`result`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='计划任务执行日志';

CREATE TABLE `cms_tp6_cron_scheduling_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `start_time` int(11) NOT NULL COMMENT '开始时间',
  `end_time` int(11) NOT NULL COMMENT '结束时间',
  `use_time` int(11) NOT NULL COMMENT '耗时',
  `error_count` int(11) NOT NULL COMMENT '错误数量',
  `cron_count` int(11) NOT NULL COMMENT '周期内执行计划任务次数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='调度运行日志';

-- 配置表
CREATE TABLE `cms_tp6_cron_config` (
  `key` varchar(32) NOT NULL DEFAULT '' COMMENT '键',
  `value` varchar(256) NOT NULL DEFAULT '' COMMENT '值',
  `title` varchar(32) NOT NULL DEFAULT '' COMMENT '标题',
  `descrption` varchar(32) NOT NULL DEFAULT '',
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `cms_tp6_cron_config` (`key`, `value`, `title`, `descrption`)
VALUES
	('enable_cron', '1', '是否启用', '1启动 0停止'),
	('secret_key', '', '私钥', '');

-- ----------------------------
-- 计划任务
-- ----------------------------

DROP TABLE IF EXISTS `cms_tp6_message_msg`;
CREATE TABLE `cms_tp6_message_msg` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL DEFAULT '' COMMENT '消息标题',
  `content` varchar(512) NOT NULL DEFAULT '' COMMENT '消息内容',
  `target` varchar(128) NOT NULL DEFAULT '' COMMENT '消息源',
  `target_type` varchar(128) NOT NULL DEFAULT '' COMMENT '消息源类型',
  `sender` varchar(128) NOT NULL DEFAULT '' COMMENT '发送者',
  `sender_type` varchar(128) NOT NULL DEFAULT '' COMMENT '发送者类型',
  `receiver` varchar(128) NOT NULL DEFAULT '' COMMENT '接收者',
  `receiver_type` varchar(128) NOT NULL DEFAULT '' COMMENT '接收者类型',
  `read_status` int(11) NOT NULL DEFAULT '0' COMMENT '阅读状态: 0未阅读 1已阅读',
  `process_status` int(11) NOT NULL DEFAULT '0' COMMENT '处理状态：0未处理 1已处理, 2处理中',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `send_time` int(11) NOT NULL DEFAULT '0' COMMENT '发送时间',
  `type` varchar(128) NOT NULL DEFAULT 'message' COMMENT '消息类型：message私信 remind提醒 announce公告',
  `class` varchar(128) NOT NULL DEFAULT '' COMMENT '实例化的类名',
  `read_time` int(11) NOT NULL DEFAULT '0' COMMENT '阅读时间',
  `process_num` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '处理次数',
  PRIMARY KEY (`id`),
  KEY `create_time` (`create_time`),
  KEY `sender` (`sender`),
  KEY `sender_type` (`sender_type`),
  KEY `receiver` (`receiver`),
  KEY `receiver_type` (`receiver_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
