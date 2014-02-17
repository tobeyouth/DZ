#git使用流程

###快速入门

1. 首先你得有个``github``账号
2. 其次，你的电脑里得装有``git``，mac os中自带git，window可以去[git download](http://git-scm.com/downloads)，下载一个。
3. 再次，你最好添加了个``ssh key``在你的电脑中，具体怎么添加可以看这个教程：[generating-ssh-keys](https://help.github.com/articles/generating-ssh-keys)
4. 然后，你就可以通过git指令来下载和提交代码了。

###建立你本地的代码库
1. 首先，你得打开``git``，mac用户可以基本无视这个过程；window用户需要双击桌面上的``git bash``图标。
2. 在github上``fork``dz项目。
2. 其次，你需要建立你本地的代码库，你可以通过以下命令来建立你的代码库：
	
		// 克隆代码库
		git clone git@github.com:yourname/DZ.git
		
		// 建立两个远程库
		// 你的分支远程库
		git remote add projectremote git@github.com:yourname/DZ.git
		// 项目主干远程库
		git remote add dzremote git@github.com:tobeyouth/DZ.git
		
		// 同步远程库中的所有分支
		git remote update
		
		// 拉取最新分支
		git pull

###开始提交你的代码

1. 首先，你需要在你的本地新建一个分支:
	
		git checkout -b 你的分支名

2. 接下来，确认你的分支创建成功，一定不要在``master``分支上进行代码的修改
3. 然后，确认你是在分支中之后，开始工作吧！
4. 在修改了一些代码之后，你可能想要先提交一下，这个时候，你可以这样：
		
		// 将你的代码提交到缓存区
		git add . 或 git add -A
		
		// 提交到本地的代码库中
		git commit -m '提交信息'
		
5. 此时，你的代码已经在你本地的代码库中了，你可以通过

		git checkout 分支名
		
	切换分支。
6. 如果你想要提交到远程库中，请先确认你的电脑连到了网上；然后执行以下命令:
		
		// 先切换到master下，更新代码
		git checkout master
		git pull
		
		// 再新建一个merge分支，以免merge过程中出现的冲突会污染你开发的分支
		git checkout -b merge_你的分支名
		
		// 合并你的开发分支
		git merge --no-ff 你的开发分支
		
		// 如果没出错，合并成功了
		// 你就可以合并你的开发分支了
		git checkout 你的开发分支
		git merge --no-ff merge_你的开发分支
		
		// 没有问题的话，你就可以提交了
		git push dzremote 你的开发分支:remote_你的开发分支
		
		// 如果合并出现了问题，那一定是你的代码跟master中最新的代码有冲突
		// 需要手动到相应的文件中进行修改，以解决冲突

7. 这时，如果提交成功的话，你的代码就已经到了``你的分支的master``上，可以通过github项目页中的``merge requset``按钮来合并代码到你的项目master中。
8. 然后，``发邮件,qq,或者微信``告诉我，我会帮你合并到项目的master上.
		

###合并代码到主干上

只有一个办法，那就是``告诉我，我给你合并``

###合并项目主干到你的分支主干上

1. 首先切换到你本地的``master``上，然后更新项目主干
		
		// 更新项目主干
		git fetch projectremote
		// 更新你的分支主干
		git pull
2. 然后将项目主干合并到你的主干上：

		git merge projectremote/master
		
3. 接下来就是继续开发代码了。


###bonus

- windows推荐使用[github的客户端](http://windows.github.com)
- 合并冲突可以使用 [source tree](http://www.sourcetreeapp.com)来管理和解决。


	
	
	
	