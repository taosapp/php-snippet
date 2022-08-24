# Debian 10 安装 phpMyAdmin
2021-08-13 11:13:00

Debian 10 的 mysql 叫 mariadb-server，是Oracle mysql的开源版本

```bash
apt update
apt install mariadb-server
mysql_secure_installation

# 此脚本将带您完成一系列提示，您可以在其中对 MariaDB 设置进行一些更改。第一个提示将要求您输入当前的数据库 root密码。这不要与系统 root混淆。该数据库根用户是在数据库系统完全权限的管理用户。因为您刚刚安装了 MariaDB，还没有进行任何配置更改，所以这个密码将为空，所以只需ENTER在提示下按即可。
# 下一个提示询问您是否要设置数据库 root密码。因为 MariaDB 对root用户使用一种特殊的身份验证方法，通常比使用密码更安全，所以您现在不需要设置它。键入N，然后按ENTER。

# 从那里，您可以按Y，然后ENTER接受所有后续问题的默认值。这将删除匿名用户和测试数据库，禁用远程root登录，并加载这些新规则，以便 MariaDB 立即尊重您所做的更改。
# 完成后，输入以下命令登录 MariaDB 控制台：
mariadb

    # 建立一个数据库用户
    MariaDB [(none)] > GRANT ALL ON *.* TO '建一个用户名'@'localhost' IDENTIFIED BY '该用户名的密码';
    # 刷新权限以确保它们已保存并在当前会话中可用：
    MariaDB [(none)] > FLUSH PRIVILEGES;
    # 退出 mariadb命令行
    MariaDB [(none)] > exit

# 安装 phpmyadmin
apt install phpmyadmin

# 如果遇到缺包，请依次安装提示所缺的软件包

# 另外，phpmyadmin依赖的php-twig在debian10的稳定版中的版本较老，所以先改一下php-twig要用的最新分支
aptitude -t buster-backports install php-twig

# 建立软连接
ln -s /usr/share/phpmyadmin /var/www/域名目录/phpmyadmin

```

参考链接：
- https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mariadb-php-lemp-stack-on-debian-10
- https://www.digitalocean.com/community/tutorials/how-to-install-and-secure-phpmyadmin-with-nginx-on-a-debian-9-server
- https://stackoverflow.com/questions/61477019/phpmyadmin-depends-php-twig-2-9-but-2-6-2-2-is-to-be-installed-what
- https://linuxhint.com/install_phpmyadmin_debian_10/