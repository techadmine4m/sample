pipeline {
  environment {
    registry = "gcr.io/smiling-destiny-184908/sample"
    registryCredential = 'gcr:smiling-destiny-184908'
	CLUSTER_NAME = 'common-website-cluster'
	CREDENTIALS_ID = 'smiling-destiny-184908'
    dockerImage = ''
	PROJECT_ID = 'smiling-destiny-184908'
	LOCATION = 'asia-south1-b'
  }
  agent any
 
  stages {
    stage('Cloning Git') {
      steps {
        git url: 'https://github.com/techadmine4m/sample', branch: 'master',
                 credentialsId: 'eb1dad5f-2a0d-412c-92b5-8c87a53ed8b2'
      }
    }
    
    stage('Building image') {
      steps{
        script {
          dockerImage = docker.build registry + ":$BUILD_NUMBER"
        }
      }
    }
    stage('Deploy Image') {
      steps{
         script {
            docker.withRegistry( 'https://gcr.io/smiling-destiny-184908/', registryCredential ) { 

                        dockerImage.push() 

                    }
           
          }
        }
      }
	 
      stage('Deploy to GKE') {
            steps{
                sh "sed -i 's/sample:latest/sample:$BUILD_NUMBER/' sample-web-deployment.yaml"
                step([$class: 'KubernetesEngineBuilder', projectId: env.PROJECT_ID, clusterName: env.CLUSTER_NAME, location: env.LOCATION, manifestPattern: 'sample-web-deployment.yaml', credentialsId: env.CREDENTIALS_ID, verifyDeployments: true])
            }
        }
 
	  
    }
   
  }
