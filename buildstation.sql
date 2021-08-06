/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80012
 Source Host           : 127.0.0.1:3306
 Source Schema         : buildstation

 Target Server Type    : MySQL
 Target Server Version : 80012
 File Encoding         : 65001

 Date: 06/08/2021 09:49:44
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tp_admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `tp_admin_menu`;
CREATE TABLE `tp_admin_menu`  (
  `admin_menu_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '菜单id',
  `menu_pid` int(11) NOT NULL DEFAULT 0 COMMENT '菜单父级id',
  `menu_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '菜单名称',
  `menu_url` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '菜单链接',
  `menu_sort` int(10) NULL DEFAULT 200 COMMENT '菜单排序',
  `is_disable` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否禁用1是0否',
  `is_unauth` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否无需权限1是0否',
  `is_unlogin` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否无需登录1是0否',
  `is_delete` tinyint(1) NULL DEFAULT 0 COMMENT '是否删除1是0否',
  `create_time` datetime(0) NULL DEFAULT NULL COMMENT '添加时间',
  `update_time` datetime(0) NULL DEFAULT NULL COMMENT '修改时间',
  `delete_time` datetime(0) NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`admin_menu_id`) USING BTREE,
  INDEX `admin_menu_id`(`admin_menu_id`) USING BTREE,
  INDEX `menu_pid`(`menu_pid`, `menu_name`) USING BTREE,
  INDEX `menu_url`(`menu_url`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 234 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '菜单' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tp_admin_menu
-- ----------------------------
INSERT INTO `tp_admin_menu` VALUES (1, 0, '控制台', '', 300, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (3, 88, '菜单管理', '', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (4, 88, '用户管理', '', 180, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (5, 88, '角色管理', '', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (12, 88, '个人中心', '', 130, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (13, 3, '菜单列表', 'admin/AdminMenu/list', 220, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (14, 3, '菜单添加', 'admin/AdminMenu/add', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (15, 3, '菜单修改', 'admin/AdminMenu/edit', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (16, 3, '菜单删除', 'admin/AdminMenu/dele', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (17, 4, '用户列表', 'admin/AdminUser/list', 220, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (18, 4, '用户添加', 'admin/AdminUser/add', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (19, 4, '用户修改', 'admin/AdminUser/edit', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (20, 4, '用户删除', 'admin/AdminUser/dele', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (22, 5, '角色列表', 'admin/AdminRole/list', 220, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (23, 5, '角色添加', 'admin/AdminRole/add', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (24, 5, '角色修改', 'admin/AdminRole/edit', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (25, 5, '角色删除', 'admin/AdminRole/dele', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (27, 3, '菜单是否禁用', 'admin/AdminMenu/disable', 160, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (28, 3, '菜单是否无需权限', 'admin/AdminMenu/unauth', 150, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (29, 4, '用户信息', 'admin/AdminUser/info', 210, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (30, 4, '用户是否禁用', 'admin/AdminUser/disable', 130, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (31, 4, '用户权限分配', 'admin/AdminUser/rule', 150, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (32, 4, '用户密码重置', 'admin/AdminUser/pwd', 140, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (33, 5, '角色禁用', 'admin/AdminRole/disable', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (35, 4, '用户是否超管', 'admin/AdminUser/super', 120, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (37, 58, '随机字符串', 'admin/AdminUtils/strrand', 200, 0, 1, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (38, 58, '时间戳转换', 'admin/AdminUtils/timestamp', 200, 0, 1, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (40, 58, '生成二维码', 'admin/AdminUtils/qrcode', 200, 0, 1, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (41, 88, '日志管理', '', 140, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (42, 41, '日志管理列表', 'admin/AdminUserLog/list', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (43, 41, '日志管理信息', 'admin/AdminUserLog/info', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (44, 41, '日志管理删除', 'admin/AdminUserLog/dele', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (45, 12, '我的信息', 'admin/AdminUserCenter/info', 200, 0, 1, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (46, 12, '修改信息', 'admin/AdminUserCenter/edit', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (47, 12, '修改密码', 'admin/AdminUserCenter/pwd', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (48, 12, '更换头像', 'admin/AdminUserCenter/avatar', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (49, 1, '首页', 'admin/AdminIndex/index', 200, 0, 1, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (50, 58, '地图坐标', 'admin/AdminUtils/map', 150, 0, 1, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (51, 111, '登录', 'admin/AdminLogin/login', 160, 0, 0, 1, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (52, 111, '退出', 'admin/AdminLogin/logout', 150, 0, 1, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (53, 0, '系统管理', '', 120, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (54, 12, '我的日志', 'admin/AdminUserCenter/log', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (58, 53, '实用工具', 'admin/AdminUtils/utils', 160, 0, 1, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (63, 58, '字符串转换', 'admin/AdminUtils/strtran', 210, 0, 1, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (71, 188, '缓存设置', '', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (73, 188, '验证码设置', '', 150, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (75, 111, '验证码', 'admin/AdminLogin/captcha', 170, 0, 0, 1, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (85, 188, 'Token设置', '', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (86, 58, '字节转换', 'admin/AdminUtils/bytetran', 200, 0, 1, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (87, 58, 'IP信息', 'admin/AdminUtils/ipinfo', 200, 0, 1, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (88, 0, '权限管理', '', 150, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (111, 0, '登录退出', '', 100, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (113, 3, '菜单角色', 'admin/AdminMenu/role', 140, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (114, 3, '菜单用户', 'admin/AdminMenu/user', 130, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (115, 5, '角色用户', 'admin/AdminRole/user', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (116, 41, '日志管理统计', 'admin/AdminUserLog/stat', 150, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (117, 12, '我的设置', 'admin/AdminUserCenter/setting', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (118, 3, '菜单角色解除', 'admin/AdminMenu/roleRemove', 135, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (119, 3, '菜单用户解除', 'admin/AdminMenu/userRemove', 120, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (120, 5, '角色用户解除', 'admin/AdminRole/userRemove', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (121, 4, '用户更换头像', 'admin/AdminUser/avatar', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (122, 58, '服务器信息', 'admin/AdminUtils/server', 120, 0, 1, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (123, 156, '会员管理', '', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (124, 123, '会员列表', 'admin/Member/list', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (125, 123, '会员信息', 'admin/Member/info', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (126, 123, '会员添加', 'admin/Member/add', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (127, 123, '会员修改', 'admin/Member/edit', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (128, 123, '会员删除', 'admin/Member/dele', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (129, 123, '会员重置密码', 'admin/Member/pwd', 130, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (130, 123, '会员是否禁用', 'admin/Member/disable', 120, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (131, 123, '会员更换头像', 'admin/Member/avatar', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (132, 186, '接口管理', '', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (133, 132, '接口列表', 'admin/Api/list', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (134, 132, '接口信息', 'admin/Api/info', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (135, 132, '接口添加', 'admin/Api/add', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (136, 132, '接口修改', 'admin/Api/edit', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (137, 132, '接口删除', 'admin/Api/dele', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (138, 132, '接口是否禁用', 'admin/Api/disable', 120, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (139, 132, '接口是否无需登录', 'admin/Api/unlogin', 110, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (140, 156, '会员日志', '', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (141, 140, '会员日志列表', 'admin/MemberLog/list', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (142, 140, '会员日志信息', 'admin/MemberLog/info', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (143, 140, '会员日志删除', 'admin/MemberLog/dele', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (144, 140, '会员日志统计', 'admin/MemberLog/stat', 150, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (145, 50, '高德地图坐标拾取', 'admin/AdminUtils/mapAmap', 200, 0, 1, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (146, 50, '百度地图坐标拾取', 'admin/AdminUtils/mapBaidu', 200, 0, 1, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (147, 50, '搜狗地图坐标拾取', 'admin/AdminUtils/mapSogou', 200, 0, 1, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (148, 50, '腾讯地图坐标拾取', 'admin/AdminUtils/mapTencent', 200, 0, 1, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (149, 50, '北斗卫星导航', 'admin/AdminUtils/mapBeidou', 200, 0, 1, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (150, 186, '地区管理', '', 150, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (151, 150, '地区列表', 'admin/Region/list', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (152, 150, '地区信息', 'admin/Region/info', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (153, 150, '地区添加', 'admin/Region/add', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (154, 150, '地区修改', 'admin/Region/edit', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (155, 150, '地区删除', 'admin/Region/dele', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (156, 0, '会员管理', '', 250, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (157, 186, '基础设置', '', 220, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (158, 3, '菜单信息', 'admin/AdminMenu/info', 210, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (170, 157, '验证码设置', '', 150, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (171, 157, 'Token设置', '', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (172, 1, '会员统计', 'admin/AdminIndex/member', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (173, 53, '接口文档', 'admin/AdminApidoc/apidoc', 180, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (175, 206, '新闻管理', '', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (176, 175, '新闻列表', 'admin/News/list', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (177, 175, '新闻信息', 'admin/News/info', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (178, 175, '新闻添加', 'admin/News/add', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (179, 175, '新闻修改', 'admin/News/edit', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (180, 175, '新闻删除', 'admin/News/dele', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (181, 175, '新闻上传文件', 'admin/News/upload', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (182, 175, '新闻是否置顶', 'admin/News/istop', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (183, 175, '新闻是否热门', 'admin/News/ishot', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (184, 175, '新闻是否推荐', 'admin/News/isrec', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (185, 175, '新闻是否隐藏', 'admin/News/ishide', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (186, 0, '设置管理', '', 170, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (187, 5, '角色信息', 'admin/AdminRole/info', 210, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (188, 53, '设置管理', '', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (189, 41, '日志管理清除', 'admin/AdminUserLog/clear', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (190, 186, '微信设置', '', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (191, 190, '公众号设置信息', 'admin/SettingWechat/offiInfo', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (192, 190, '公众号设置修改', 'admin/SettingWechat/offiEdit', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (193, 190, '小程序设置信息', 'admin/SettingWechat/miniInfo', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (194, 190, '小程序设置修改', 'admin/SettingWechat/miniEdit', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (195, 190, '上传二维码', 'admin/SettingWechat/qrcode', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (196, 73, '验证码设置信息', 'admin/AdminSetting/captchaInfo', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (197, 73, '验证码设置修改', 'admin/AdminSetting/captchaEdit', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (198, 71, '缓存设置信息', 'admin/AdminSetting/cacheInfo', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (199, 71, '缓存设置清除', 'admin/AdminSetting/cacheClear', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (200, 85, 'Token设置信息', 'admin/AdminSetting/tokenInfo', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (201, 85, 'Token设置修改', 'admin/AdminSetting/tokenEdit', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (202, 171, 'Token设置信息', 'admin/Setting/tokenInfo', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (203, 171, 'Token设置修改', 'admin/Setting/tokenEdit', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (204, 170, '验证码设置信息', 'admin/Setting/captchaInfo', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (205, 170, '验证码设置修改', 'admin/Setting/captchaEdit', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (206, 0, '新闻管理', '', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (207, 206, '新闻分类', '', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (208, 207, '新闻分类列表', 'admin/NewsCategory/list', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (209, 207, '新闻分类信息', 'admin/NewsCategory/info', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (210, 207, '新闻分类添加', 'admin/NewsCategory/add', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (211, 207, '新闻分类修改', 'admin/NewsCategory/edit', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (212, 207, '新闻分类删除', 'admin/NewsCategory/dele', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (213, 207, '新闻分类是否隐藏', 'admin/NewsCategory/ishide', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (214, 175, '新闻分类', 'admin/News/category', 225, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (215, 3, '菜单是否无需登录', 'admin/AdminMenu/unlogin', 145, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (216, 58, '在线工具', 'admin/AdminUtils/toollu', 110, 0, 1, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (217, 188, '日志设置', '', 120, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (218, 217, '日志设置信息', 'admin/AdminSetting/logInfo', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (219, 217, '日志设置修改', 'admin/AdminSetting/logEdit', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (220, 157, '日志设置', '', 120, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (221, 220, '日志设置信息', 'admin/Setting/logInfo', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (222, 220, '日志设置修改', 'admin/Setting/logEdit', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (223, 157, '接口设置', '', 100, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (224, 223, '接口设置信息', 'admin/Setting/apiInfo', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (225, 223, '接口设置修改', 'admin/Setting/apiEdit', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (226, 188, '接口设置', '', 110, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (227, 226, '接口设置信息', 'admin/AdminSetting/apiInfo', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (228, 226, '接口设置修改', 'admin/AdminSetting/apiEdit', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (229, 140, '会员日志清除', 'admin/MemberLog/clear', 200, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (230, 206, '测试', '', 200, 0, 0, 0, 0, '2021-06-08 15:34:35', NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (231, 230, 'test', 'admin/Test', 200, 0, 0, 0, 0, '2021-06-08 15:35:38', NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (232, 231, 'test列表', 'admin/Test/list', 200, 0, 0, 0, 0, '2021-06-08 15:35:38', NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (233, 231, 'test信息', 'admin/Test/info', 200, 0, 0, 0, 0, '2021-06-08 15:35:38', NULL, NULL);
INSERT INTO `tp_admin_menu` VALUES (234, 231, 'test添加', 'admin/Test/add', 200, 0, 0, 0, 0, '2021-06-08 15:35:38', NULL, NULL);

-- ----------------------------
-- Table structure for tp_admin_role
-- ----------------------------
DROP TABLE IF EXISTS `tp_admin_role`;
CREATE TABLE `tp_admin_role`  (
  `admin_role_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '角色id',
  `admin_menu_ids` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT '菜单id',
  `role_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '角色名称',
  `role_desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '角色描述',
  `role_sort` int(10) NULL DEFAULT 200 COMMENT '角色排序',
  `is_disable` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否禁用1是0否',
  `is_delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否删除1是0否',
  `create_time` datetime(0) NULL DEFAULT NULL COMMENT '添加时间',
  `update_time` datetime(0) NULL DEFAULT NULL COMMENT '修改时间',
  `delete_time` datetime(0) NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`admin_role_id`) USING BTREE,
  INDEX `admin_rule_id`(`admin_role_id`) USING BTREE,
  INDEX `rule_name`(`role_name`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '角色' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tp_admin_setting
-- ----------------------------
DROP TABLE IF EXISTS `tp_admin_setting`;
CREATE TABLE `tp_admin_setting`  (
  `admin_setting_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '设置id',
  `token_name` varchar(31) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT 'Token名称',
  `token_key` varchar(31) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT 'Token密钥',
  `token_exp` int(5) NULL DEFAULT 12 COMMENT 'Token有效时间（小时）',
  `captcha_switch` tinyint(1) NULL DEFAULT 1 COMMENT '验证码1开启0关闭',
  `log_switch` tinyint(1) NULL DEFAULT 1 COMMENT '日志记录1开启0关闭',
  `api_rate_num` int(5) NULL DEFAULT 3 COMMENT '接口请求速率（次数）',
  `api_rate_time` int(5) NULL DEFAULT 1 COMMENT '接口请求速率（时间）',
  `create_time` datetime(0) NULL DEFAULT NULL COMMENT '添加时间',
  `update_time` datetime(0) NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`admin_setting_id`) USING BTREE,
  INDEX `admin_setting_id`(`admin_setting_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '设置' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tp_admin_user
-- ----------------------------
DROP TABLE IF EXISTS `tp_admin_user`;
CREATE TABLE `tp_admin_user`  (
  `admin_user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `admin_role_ids` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '角色id',
  `admin_menu_ids` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '菜单id',
  `username` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '账号',
  `nickname` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '昵称',
  `password` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '密码',
  `phone` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '手机',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '邮箱',
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'static/img/favicon.ico' COMMENT '头像',
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '备注',
  `sort` int(10) NULL DEFAULT 200 COMMENT '排序',
  `is_disable` tinyint(1) NULL DEFAULT 0 COMMENT '是否禁用1是0否',
  `is_super` tinyint(1) NULL DEFAULT 0 COMMENT '是否超管1是0否',
  `is_delete` tinyint(1) NULL DEFAULT 0 COMMENT '是否删除1是0否',
  `login_num` int(10) NULL DEFAULT 0 COMMENT '登录次数',
  `login_ip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '登录IP',
  `login_region` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '登录地区',
  `login_time` datetime(0) NULL DEFAULT NULL COMMENT '登录时间',
  `logout_time` datetime(0) NULL DEFAULT NULL COMMENT '退出时间',
  `create_time` datetime(0) NULL DEFAULT NULL COMMENT '添加时间',
  `update_time` datetime(0) NULL DEFAULT NULL COMMENT '修改时间',
  `delete_time` datetime(0) NULL DEFAULT NULL COMMENT '删除时间',
  `webs` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT '特殊情况（该用户能看到的网站）',
  PRIMARY KEY (`admin_user_id`) USING BTREE,
  INDEX `username`(`username`, `password`) USING BTREE,
  INDEX `admin_user_id`(`admin_user_id`) USING BTREE,
  INDEX `email`(`email`(191)) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '用户' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tp_admin_user_log
-- ----------------------------
DROP TABLE IF EXISTS `tp_admin_user_log`;
CREATE TABLE `tp_admin_user_log`  (
  `admin_user_log_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户日志id',
  `admin_user_id` int(11) NOT NULL DEFAULT 0 COMMENT '用户id',
  `admin_menu_id` int(11) NULL DEFAULT 0 COMMENT '菜单id',
  `log_type` tinyint(1) NULL DEFAULT 2 COMMENT '1登录2操作3退出',
  `request_method` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '请求方式',
  `request_ip` varchar(130) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '请求ip',
  `request_country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '请求国家',
  `request_province` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '请求省份',
  `request_city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '请求城市',
  `request_area` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '请求区县',
  `request_region` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '请求地区',
  `request_isp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '请求ISP',
  `request_param` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT '请求参数',
  `response_code` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '返回码',
  `response_msg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '返回描述',
  `is_delete` tinyint(1) NULL DEFAULT 0 COMMENT '是否删除1是0否',
  `create_time` datetime(0) NULL DEFAULT NULL COMMENT '添加时间',
  `update_time` datetime(0) NULL DEFAULT NULL COMMENT '修改时间',
  `delete_time` datetime(0) NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`admin_user_log_id`) USING BTREE,
  INDEX `request_isp`(`request_isp`) USING BTREE,
  INDEX `request_city`(`request_city`(191)) USING BTREE,
  INDEX `request_province`(`request_province`(191)) USING BTREE,
  INDEX `request_country`(`request_country`(191)) USING BTREE,
  INDEX `admin_menu_id`(`admin_menu_id`) USING BTREE,
  INDEX `admin_user_log_id`(`admin_user_log_id`) USING BTREE,
  INDEX `admin_user_id`(`admin_user_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '日志' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tp_data_rule
-- ----------------------------
DROP TABLE IF EXISTS `tp_data_rule`;
CREATE TABLE `tp_data_rule`  (
  `data_rule_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '数据规则id',
  `data_rule_group_id` int(11) NULL DEFAULT 0 COMMENT '数据规则组id',
  `rule_column` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '规则字段',
  `rule_conditions` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '规则表达式',
  `rule_value` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '规则值',
  `is_disable` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否禁用1是0否',
  `is_delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否删除1是0否',
  `create_time` datetime(0) NULL DEFAULT NULL COMMENT '添加时间',
  `update_time` datetime(0) NULL DEFAULT NULL COMMENT '修改时间',
  `delete_time` datetime(0) NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`data_rule_id`) USING BTREE,
  INDEX `data_rule_id`(`data_rule_id`) USING BTREE,
  INDEX `rule_column`(`rule_column`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '数据规则' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tp_data_rule_group
-- ----------------------------
DROP TABLE IF EXISTS `tp_data_rule_group`;
CREATE TABLE `tp_data_rule_group`  (
  `data_rule_group_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id',
  `rule_group_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '规则组名称',
  `is_disable` tinyint(1) NULL DEFAULT 0 COMMENT '是否禁用1是0否',
  `is_delete` tinyint(1) NULL DEFAULT 0 COMMENT '是否删除1是0否',
  `create_time` datetime(0) NULL DEFAULT NULL COMMENT '创建时间',
  `update_time` datetime(0) NULL DEFAULT NULL COMMENT '更新时间',
  `delete_time` datetime(0) NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`data_rule_group_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tp_member
-- ----------------------------
DROP TABLE IF EXISTS `tp_member`;
CREATE TABLE `tp_member`  (
  `member_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '会员id',
  `username` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '账号',
  `nickname` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '昵称',
  `password` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '密码',
  `phone` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '手机',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '邮箱',
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '头像',
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '备注',
  `region_id` int(10) NULL DEFAULT 0 COMMENT '地区id',
  `sort` int(10) NULL DEFAULT 10000 COMMENT '排序',
  `reg_channel` tinyint(1) NULL DEFAULT 1 COMMENT '注册渠道1Web2公众号3小程序4安卓5苹果',
  `is_disable` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否禁用1是0否',
  `is_delete` tinyint(1) NULL DEFAULT 0 COMMENT '是否删除1是0否',
  `login_num` int(10) NULL DEFAULT 0 COMMENT '登录次数',
  `login_ip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '登录IP',
  `login_region` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '登录地区',
  `login_time` datetime(0) NULL DEFAULT NULL COMMENT '登录时间',
  `logout_time` datetime(0) NULL DEFAULT NULL COMMENT '退出时间',
  `create_time` datetime(0) NULL DEFAULT NULL COMMENT '注册时间',
  `update_time` datetime(0) NULL DEFAULT NULL COMMENT '修改时间',
  `delete_time` datetime(0) NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`member_id`) USING BTREE,
  INDEX `username`(`username`, `password`) USING BTREE,
  INDEX `phone`(`phone`) USING BTREE,
  INDEX `email`(`email`(191)) USING BTREE,
  INDEX `member_id`(`member_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '会员' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tp_member_log
-- ----------------------------
DROP TABLE IF EXISTS `tp_member_log`;
CREATE TABLE `tp_member_log`  (
  `member_log_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '会员日志id',
  `member_id` int(11) NOT NULL DEFAULT 0 COMMENT '会员id',
  `log_type` tinyint(1) NULL DEFAULT 3 COMMENT '1注册2登录3操作4退出',
  `api_id` int(11) NULL DEFAULT 0 COMMENT '接口id',
  `request_method` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '请求方式',
  `request_ip` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '请求IP',
  `request_country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '请求国家',
  `request_province` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '请求省份',
  `request_city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '请求城市',
  `request_area` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '请求区县',
  `request_region` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '请求地区',
  `request_isp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '请求ISP',
  `request_param` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT '请求参数',
  `response_code` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '返回码',
  `response_msg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '返回描述',
  `is_delete` tinyint(1) NULL DEFAULT 0 COMMENT '是否删除1是0否',
  `create_time` datetime(0) NULL DEFAULT NULL COMMENT '添加时间',
  `update_time` datetime(0) NULL DEFAULT NULL COMMENT '修改时间',
  `delete_time` datetime(0) NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`member_log_id`) USING BTREE,
  INDEX `request_isp`(`request_isp`) USING BTREE,
  INDEX `request_city`(`request_city`(191)) USING BTREE,
  INDEX `request_province`(`request_province`(191)) USING BTREE,
  INDEX `request_country`(`request_country`(191)) USING BTREE,
  INDEX `member_log_id`(`member_log_id`) USING BTREE,
  INDEX `member_id`(`member_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '会员日志' ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
