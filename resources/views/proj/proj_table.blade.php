					<tr>
						<td><?php 
						if (ISSET($project->completed)) {
							echo "<s>$project->project_name</s>"; 
						} else {
							echo $project->project_name;
						}
						?>
						</td>
						
						<td>
						
							<?php 
						if (ISSET($project->completed)) {
							echo "<s>$project->task_name</s>"; 
						} else {
							echo $project->task_name;
						}
						?>
					
						</td>
						<td>
						
							 <?php 
						if (ISSET($project->completed)) {
							echo "<s>$project->task_description</s>"; 
						} else {
							echo $project->task_description;
						}
						?>
					
						</td>
						<td>
						
							<?php echo $project->status; ?>
						
						</td>
					</tr>